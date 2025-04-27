<?php

namespace App\Http\Livewire\Quotations;

use DB;
use PDF;
use Session;
use \Carbon\Carbon;
use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\OSC;
use App\Models\CourierExtraCost;
use App\Models\CourierExtraCostItem;
use App\Models\QuotationManual;
use App\Models\QuotationDetail;

// MailTrap
use Mailtrap\Config;
use Mailtrap\MailtrapClient;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\EmailHeader\CategoryHeader;

class MainDashboard extends Component
{
    public function render()
    {
        return view('livewire.quotations.main-dashboard');
    }

    // MIAMI P.O.BOX FUNCTIONS
    public $input_price = 10 , $input_weight = 2, $input_shipping = 4, $input_dai_description = '{"name":"Accesorio de Carro","val":"15"}', $input_units = 1;
    public $weight, $shipping;
    public $transport, $clearance, $insurance ,$dai ,$iva, $delivery, $total, $global_total;

    public $email;
    public $quotation_generated = false, $quotation_preview = false, $quotation_sended = false;
    public $extra_costs = [], $extra_discount = [];

    public function miamiPoboxCalculator()
    {
        $this->validate([
            'input_price' => 'required',
            'input_weight' => 'required',
            'input_shipping' => 'required',
            'input_dai_description' => 'required',
            'input_units' => 'required',
        ]);

        // Change this to enter client membership code
        $rates = DB::table('membership_table')->where('idmembership_table',2)->first();

        $US = DB::table('exchange')->where('currency','US')->first()->value;

        $quotation_detail = new QuotationDetail();
        $quotation_detail->dollar_exchange = $US;
        $quotation_detail->dai_description = json_decode($this->input_dai_description)->name;
        $quotation_detail->dai_percentage = json_decode($this->input_dai_description)->val;
        $quotation_detail->transport = $this->input_weight * $rates->cost_per_pound_miami * $this->input_units;
        $quotation_detail->clearance =  $rates->clearance * $this->input_units;
        $quotation_detail->insurance = ($this->input_price + $quotation_detail->transport) * 0.022 * $this->input_units;
        $quotation_detail->dai = ($this->input_price + $quotation_detail->transport + $quotation_detail->insurance) * (json_decode($this->input_dai_description)->val/100) * $this->input_units;
        $quotation_detail->iva = ($this->input_price + $quotation_detail->insurance + $quotation_detail->transport + $quotation_detail->dai) * 0.12 * $this->input_units;
        $quotation_detail->shipping = $this->input_shipping * $this->input_units;
        $quotation_detail->local_delivery = $rates->shipping * $this->input_units;
        $quotation_detail->total = $quotation_detail->transport + $quotation_detail->clearance + $quotation_detail->insurance + $quotation_detail->dai + $quotation_detail->iva + $quotation_detail->shipping + $quotation_detail->delivery;

        foreach ($quotation_detail->getAttributes() as $key => $item)
        {
            if($key != 'dollar_exchange' && $key != 'dai_description')
            {
                $this->{$key} = $item*$US;
            }
        }

        $this->quotation_preview = true;
        Session::put('quotation_detail', $quotation_detail);
        $this->miamiPoboxGlobalTotal();
        // dd($this->render_extra_cost);
    }

    public function miamiNewArticleLoadData()
    {
        $this->extra_costs = CourierExtraCost::all()->where('type',1);
    }

    public function miamiNewDiscountLoadData()
    {
        $this->extra_discount = CourierExtraCost::all()->where('type',2);
    }

    public $render_extra_cost = [];
    public function miamiNewArticleAdd($id)
    {
        $item = CourierExtraCost::find($id)->getAttributes();
        array_push($this->render_extra_cost,$item);

        $this->miamiPoboxGlobalTotal();
    }

    public $render_extra_discount = [];
    public function miamiNewDiscountAdd($id)
    {
        $item = CourierExtraCost::find($id)->getAttributes();
        array_push($this->render_extra_discount,$item);

        $this->miamiPoboxGlobalTotal();
    }

    public function miamiPoboxGlobalTotal()
    {
        $this->global_total = $this->total;

        foreach ($this->render_extra_cost as $key => $value) {
            $this->global_total += $value['total'];
        }

        foreach ($this->render_extra_discount as $key => $value) {
            $this->global_total += $value['total'];
        }
    }

    public function miamiPoboxGenerateQuotation()
    {
        do {
            $random = random_int(1000000000,9999999999);
        } while (QuotationManual::where('quotation_number','=',$random)->exists());

        $quotation_manual = new QuotationManual();
        $quotation_manual->quotation_number = 'SGLQMIAPB'.$random;
        $quotation_manual->service = 2;
        $quotation_manual->terms = 1;
        $quotation_manual->save();

        $quotation_detail = Session::get('quotation_detail');
        $quotation_detail->quotation_manual_idquotation_manual = $quotation_manual->idquotation_manual;
        $quotation_detail->status = 1;
        $quotation_detail->save();

        $this->quotation_generated = true;
    }

    public function miamiPoboxDownloadPDf()
    {
        $quotation_detail = session('quotation_detail')->getAttributes();

        $quotation_manual = QuotationManual::find($quotation_detail['quotation_manual_idquotation_manual']);

        $quotation_detail['quotation_number'] = $quotation_manual->quotation_number;
        $quotation_detail['created_at'] = $quotation_manual->created_at;
        $quotation_detail['weight'] = 1;

        $pdf = PDF::loadView('livewire.quotations.pdf_templates.quotationDetailMiamiPobox', $quotation_detail);

        return response()->streamDownload(function () use($pdf) {
            echo  $pdf->stream();
        }, $quotation_manual->quotation_number.'.pdf');
    }

    public $send_quotation_name, $send_quotation_lastname,$send_quotation_email;
    public function miamiPoboxSendQuotation()
    {
        $quotation_detail = session('quotation_detail')->getAttributes();

        $quotation_manual = QuotationManual::find($quotation_detail['quotation_manual_idquotation_manual']);
        $quotation_manual->name = $this->send_quotation_name;
        $quotation_manual->lastname = $this->send_quotation_lastname;
        $quotation_manual->email = $this->send_quotation_email;

        $date = Carbon::now()->toDateTimeString();
        $number = random_int(100000,999999);

        $user = Auth::user();

        $data = [];
        $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
        $mailtrap = new MailtrapClient(new Config($apiKey));
        $html = view('mail.quotationCourier', $data)->render();


        $email = (new Email())
        ->from(new Address('quotation@gruposgl.com', 'GruposSGL'))
        ->to(new Address($this->send_quotation_email))
        ->bcc($user->email)
        ->subject('Nueva Cotización'.'-'.$number.'-'.$date)
        ->html($html)
        ;

        $email->getHeaders()->add(new CategoryHeader('Integration Test'));

        $response = $mailtrap->sending()->emails()->send($email);

        $this->quotation_sended = true;
    }

    public function reloadPage()
    {
        $random = random_int(1000000000,9999999999);
        return redirect(request()->header('Referer'));
    }
    // END MIAMI P.O.BOX FUNCTIONS
}