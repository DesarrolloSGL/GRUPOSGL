<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Mail;
use \Carbon\Carbon;
use App\Models\OSC;
use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Billing;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Tracking;
use App\Models\Quotation;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\DistrictTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;

use Mailtrap\Config;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Symfony\Component\Mime\Address as EmailAddress;
use Symfony\Component\Mime\Email;
use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\EmailHeader\CustomVariableHeader;

use Illuminate\Support\Facades\Http;


class StoreController extends Controller
{
    // Start New Store

    public function index(){
        return view('store.index');
    }

    public function marketplaceIndex(){
        return view('store.devIndex');
    }

    public function marketplaceProductDetail($sku){
        return view('store.productDetail')->with(['sku'=>$sku]);
    }

    public function storeCheckout(){
        return view('store.checkout');
    }

    // End New Store

    public function storeQuotationGet(Request $request){
        $order = new Order();
        $order->order_number = 'SGLMIA'.globalRandomOrderNumber();
        $order->type = 4;
        $order->adviser_id= 0;//Pending asing automatic adviser
        $order->status = 1;
        Auth::check() ? $order->users_id = Auth::user()->id:false;
        $order->saveOrFail();

        $quotation = new Quotation();
        $quotation->sender = 'Global';
        $quotation->service = 2;
        $quotation->order_idorder = $order->idorder;
        Auth::check() ? $quotation->email=Auth::user()->email:$quotation->email = $request->email;
        $quotation->saveOrFail();

        $package = new Package();
        $package->link = $request->link;
        $package->quotation_idquotation = $quotation->idquotation;
        $package->saveOrFail();

        $payment = new Payment();
        $payment->quotation_idquotation = $quotation->idquotation;
        $payment->saveOrFail();

        return \Response::json('200');
    }

    public function storeQuotationSend(Request $request){
        $request->currency ? $request->request->add(['currency_text' => 'USD']):$request->request->add(['currency_text' => 'GTQ']);
        $request->currency ? $request->request->add(['currency' => '$']):$request->request->add(['currency' => 'Q']);
        $request->request->add(['idquotation'=>$request->quotation_id]);
        // New Quotation

        $quotation = globalNewQuotation($request);
        $package = Package::where('quotation_idquotation',$quotation->idquotation)->first();

        $request->request->add(['idpackage'=>$package->idpackage]);
        $request->request->add(['quotation_idquotation'=>$quotation->idquotation]);
        // New Package
        $package = globalNewPackage($request);

        //
        $total = $this->total($quotation->idquotation,$request->currency,false);

        // $request->request->add(['type'=>'0']);Pending
        $request->request->add(['total'=>$total['total']]);
        $request->request->add(['exchange'=>$total['exchange']]);

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();

        $request->request->add(['idpayment'=>$payment->idpayment]);
        $payment = globalNewPayment($request);

        $order = Order::findOrfail($quotation->order_idorder);
        $order->status = 7;
        $order->saveOrFail();

        $bitacora = globalNewBitacora('Old Store Quotation Send','order',$order->idorder);

        $this->EmailToClient($order->order_number,$quotation->email);

        return Redirect::to('/admin-store-quotation/'.$order->order_number);
    }

    public function EmailToClient($order_number,$email){
        $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
        $mailtrap = new MailtrapClient(new Config($apiKey));
        $data["email"] = $email;
        $data["order_number"] = $order_number;

        $html = view('mail.storeQuotationConfirm', $data)->render();

        $email = (new Email())
            ->from(new EmailAddress('cotizacion@gruposgl.com', 'GruposSGL'))
            ->to(new EmailAddress($email))
            ->subject("Cotización".'-'.$order_number)
            ->html($html)
        ;

        $response = $mailtrap->sending()->emails()->send($email);
    }

    public function storeQuotationEmailConfirm($order_number){

        $order = Order::where('order_number',$order_number)->where('type',4)->first();
        $order->users_id == null ? $order->users_id = Auth::user()->id:false;
        $order->saveOrFail();


        $quotation = Quotation::where('order_idorder',$order->idorder)->first();

        $package = Package::where('quotation_idquotation',$quotation->idquotation)->first();

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();

        $rates = globalGetRates();

        if(Auth::check()){
            $user = User::findOrfail(Auth::user()->id);
            $user->lastname = $user->last_name;
        }

        return view('store.quotation')->with([
            'order'=>$order,
            'quotation'=>$quotation,
            'package'=>$package,
            'payment'=>$payment,
            'rates'=>$rates,
            'user'=>$user,
        ]);
    }

    public function storeQuotationClientConfirm(Request $request){
        // Request // "destination" => "1"// "address_destination" => null// "name_destination" => null// "lastname_destination" => null// "phone_destination" => null// "email_destination" => null// "cui_destination" => null// "comments_destination" => null// "bill_name" => null// "bill_address" => null// "bill_nit" => null// "service" => "2"// "order" => "79330466"
        $order = Order::where('order_number',$request->order)->first();
        $order->status = 2;//$request->destination;
        $order->saveOrFail();

        $quotation = Quotation::where('order_idorder',$order->idorder)->first();
        $quotation->destination = $request->destination;
        $quotation->saveOrFail();
        $request->request->add(['idquotation'=>$quotation->idquotation]);

        $address = $this->newAddress($request,'_destination');

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();
        // $total = $payment->total;

        $request = $this->newOsc($quotation,$payment->currency,$request);
        $osc = globalNewOsc($request);

        $shipping = $this->newShipping($payment,$request);

        // Billing
        $request->request->remove('total');
        $request->request->remove('comments');
        $request->request->add(['order_idorder'=>$order->idorder]);
        $request->request->add(['name'=>$request->bill_name]);

        $request->bill_cf ? $request->request->add(['nit'=>'CF']):
        $request->request->add(['nit'=>$request->bill_nit]);

        $request->request->add(['address'=>$request->bill_address]);
        $billing = globalnewBilling($request);

        return Redirect::to('/user-orders');
    }

    public function newShipping($payment,$request){
        if($request->destination < 23){
            $user_membership = Membership::where('users_id',Auth::user()->id)->latest()->first();
            $rates = DB::table('membership_table')->where('idmembership_table',$user_membership->type)->first();

            // Type 5 => Extra_payment
            $request->merge(['type'=>5]);
            $total = $rates->shipping;

            $currency = $payment->currency;
            $currency == 'Q'? $total = $total:$total = $total/($payment->exchange);

            $request->merge(['total'=>$total]);
            $request->request->add(['currency'=>$currency]);
            $request->request->add(['comments'=>'Envío a Cda. Guatemala']);
            $request->request->add(['status'=>'1']);
            $payment = globalNewPayment($request);

            return $payment;
        }
    }

    public function newAddress($request,$_suffix){
        $quotation = Quotation::findOrFail($request->idquotation);
        // dd($quotation);
        $agency_destination = DistrictTable::findOrFail($quotation->destination);
        // dd($agency_destination);
        $agency_destination->type == 1?
        $request->request->add(['address' => $request->get('address'.$_suffix)]):
        $request->request->add(['address' => $agency_destination->name.' '.$agency_destination->address]);
        $request->request->add(['departamento' => $agency_destination->departamento]);
        $request->request->add(['municipio' => $agency_destination->municipio]);
        $request->request->add(['status' => 1]);
        $request->request->add(['type' => 2]);
        $request->request->add(['name' => $request->get('name'.$_suffix).' '.$request->get('lastname'.$_suffix)]);
        $request->request->add(['phone' => $request->get('phone'.$_suffix)]);
        $request->request->add(['email' => $request->get('email'.$_suffix)]);
        $request->request->add(['cui' => $request->get('cui'.$_suffix)]);
        $request->request->add(['comments' => $request->get('comments'.$_suffix)]);
        $request->request->add(['users_id' => Auth::user()->id]);
        $request->request->add(['quotation_idquotation' => $quotation->idquotation]);

        $address = globalNewAddress($request);

        return $address;
    }

    public function finish(Request $request){
        $quotation = Quotation::findOrFail(Session::get('idquotation'));

        foreach ($request->all() as $key => $value) {
            $value == null ? $request->request->remove($key):false;
        }

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();

        // Payment
        $request->request->add(['idpayment'=>$payment->idpayment]);
        $request->request->add(['type'=>$request->payment_mg]);
        $update_payment = globalnewPayment($request);
        $request->request->remove('type');

        // Billing
        $request->request->add(['order_idorder'=>$quotation->order_idorder]);
        $request->request->add(['name'=>$request->bill_name]);

        $request->bill_cf ? $request->request->add(['nit'=>'CF']):
        $request->request->add(['nit'=>$request->bill_nit]);

        $request->request->add(['address'=>$request->bill_address]);

        $billing = globalnewBilling($request);

        // Añadir asesor a la orden
        $sales = User::where('role','Operador')->get();

        $adviser_id = 0;
        foreach ($sales as $key => $salesman) {
            $request->adviser == ($key+1)? $adviser_id = $salesman->id:false;
        }
        $request->request->add(['adviser_id'=>$adviser_id]);

        // Order
        $request->request->add(['idorder'=>$quotation->order_idorder]);
        $request->request->add(['status'=>'2']);
        $update_order = globalnewOrder($request);

        session()->forget('idquotation');

        return \Response::json(['order'=>$quotation->order_idorder]);
    }

    public function newOsc($quotation,$currency,$request){
        $total = $this->total($quotation->idquotation,$currency,true);

        $request->request->add(['transport'=>$total['total']['transport']]);
        $request->request->add(['clearance'=>$total['total']['clearance']]);
        $request->request->add(['insurance'=>$total['total']['insurance']]);
        $request->request->add(['dai'=>$total['total']['dai']]);
        $request->request->add(['iva'=>$total['total']['iva']]);
        $request->request->add(['duca'=>$total['total']['duca']]);
        $request->request->add(['sed'=>$total['total']['sed']]);
        $request->request->add(['total'=>$total['total']['total']]);
        $request->request->add(['order_idorder'=>$quotation->order_idorder]);

        return $request;
    }

    public function getPayment($quotation){
        $payments = Payment::where('quotation_idquotation',$quotation->idquotation)->get();

        $total = $payments->first()->total;
        foreach ($payments->where('type',5) as $key => $p) {
            $total += $p->total;
        }

        return(['payments'=>$payments, 'total'=>$total]);
    }

    public function oscPdf($idquotation=null)
    {
        $US = DB::table('exchange')
        ->where('currency','US')
        ->first()->value;

        $idquotation?
        $quotation = Quotation::findOrFail($idquotation):
        $quotation = Quotation::findOrFail(Session::get('idquotation'));

        $payments = $this->getPayment($quotation);

        $order = Order::findOrFail($quotation->order_idorder);
        // osc Middleware
        if(
            (Auth::user()->hasrole('super-admin') ||
            Auth::user()->hasrole('admin') ||
            Auth::user()->hasrole('operator') ||
            Auth::user()->hasrole('accounting') ||
            $order->users_id == Auth::user()->id)
        )
        {
            $package = Package::where('quotation_idquotation',$quotation->idquotation)->first();
            $billing = Billing::where('order_idorder',$quotation->order_idorder)->first();
            $address = Address::where('quotation_idquotation',$quotation->idquotation)->first();

            $osc = OSC::where('order_idorder',$quotation->order_idorder)
            ->first()
            ->getAttributes();

            $currency = $payments['payments'][0]->currency;

            $currency == 'Q'? $package->price = $package->price*$US:false;
            $currency == 'Q'? $package->shipping = $package->shipping*$US:false;

            $osc['weight'] = $package->weight;
            $osc['payments'] = $payments;
            $osc['billing'] = $billing;
            $osc['address'] = $address;
            $osc['package'] = $package;
            $osc['order_number'] = $order->order_number;
        }

        // dd($osc);

        $pdf = PDF::loadView('quoters.oscStorePdf', $osc);

        return $pdf->stream('File.pdf');
    }

    public function guidePdf($idquotation=null)
    {

        $idquotation?
        $quotation = Quotation::findOrFail($idquotation):
        $quotation = Quotation::findOrFail(Session::get('idquotation'));

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();

        $order = Order::findOrFail($quotation->order_idorder);
        // osc Middleware
        if(
            (Auth::user()->hasrole('super-admin') ||
            Auth::user()->hasrole('admin') ||
            Auth::user()->hasrole('operator') ||
            Auth::user()->hasrole('accounting') ||
            $order->users_id == Auth::user()->id)
        )
        {
            $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();
            $addresses = Address::where('quotation_idquotation',$quotation->idquotation)->get();
            $order->addresses = $addresses;
        }

        return view('quoters.guide')->with(['order'=>$order]);
    }

    public function total($idquotation,$currency,$osc){

        $quotation = Quotation::findOrFail($idquotation);

        $package = Package::where('quotation_idquotation',$quotation->idquotation)
        ->first();

        $_dai = (int)($package->detail);
        $_weight = $package->weight;
        $_price = $package->price;
        $_shipping = $package->shipping;

        $service = $quotation->service;

        $US = DB::table('exchange')
        ->where('currency','US')
        ->first()->value;

        $currency == 'Q'? $exchange = $US:$exchange=1;

        $commission = ($_price)*0.12;


        $duca = 0;
        $_price > 1000.00 ?
        $duca = 1495/$US:
        $duca = 0;

        $sed = 0;
        $_price > 2500.00 ?
        $sed = 401.50/$US:
        $sed = 0;

        // Membresía
        $user = User::where('email',$quotation->email)->first();
        $user ?
        $user_membership = Membership::where('users_id',$user->id)->latest()->first():
        $user_membership = null;


        $user_membership ?
        $rates = DB::table('membership_table')->where('idmembership_table',$user_membership->type)->first():
        $rates = DB::table('membership_table')->where('idmembership_table',2)->first();
        // !!Important !!Important !!Important !!Important !!Important !!Important
        // !!Important !!Important !!Important !!Important !!Important !!Important
        // Membership table type 2 only work for promotion , 1 free month Premier Club at Register
        // EndMembresía
        $transport = $_weight * $rates->cost_per_pound_miami;
        $desaduanaje = $rates->clearance;
        $insurance = ($_price + $transport) * 0.022;
        $services = $transport + $desaduanaje;
        $dai = ($_price + $transport + $insurance) * ($_dai/100);
        $iva = ($_price + $insurance + $transport + $dai) * 0.12;
        $taxes = $dai + $iva;
        $subtotal = $services + $taxes + $insurance - $iva;
        $total_pobox = $_shipping  +  $services + $taxes + $insurance + $duca + $sed;
        $total_all_include = $_shipping + $_price + $commission + $services + $taxes + $insurance + $duca + $sed;

        $total = 0;
        $service == 1 ? $total = $total_pobox*$exchange:$total = $total_all_include*$exchange;
        $total = round($total, 2);
        // dd($total);
        $array_total = ([
            'transport'=> round($transport*$exchange, 2),
            'insurance'=> round($insurance*$exchange, 2),
            'clearance'=> round($desaduanaje*$exchange, 2),
            'dai'=> round($dai*$exchange, 2),
            'iva'=> round($iva*$exchange, 2),
            'duca'=> round($duca*$exchange, 2),
            'sed'=> round($sed*$exchange, 2),
            'total'=> round($total, 2),
        ]);

        $osc ? $total = $array_total:false;


        return(['total'=>$total,'exchange'=>$US]);

    }

    // Amazon Api
    public function quoter(Request $request){
        $link = urlencode($request->link);
        $response = Http::get('https://price-tracking.onrender.com/amazon/'.$link);
        $data = [
            'json'=>$response->json(),
            'quoter'=>['new'=>'js'],
        ];

        dd($data['json']);
    }
}
