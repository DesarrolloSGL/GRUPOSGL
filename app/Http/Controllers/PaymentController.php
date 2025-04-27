<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Event;
use App\Models\Payment;
use App\Models\NeonetTransaction;
use App\Models\Package;
use App\Models\Bitacora;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Mail;
use Session;
use \Carbon\Carbon;
use Mailtrap\Config;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Illuminate\Mail\Mailable;
use Symfony\Component\Mime\Address as EmailAddress;
use Symfony\Component\Mime\Email;
use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\EmailHeader\CustomVariableHeader;

class PaymentController extends Controller
{
    public function manualPaymentApproval(Request $request){
        $order = Order::where('order_number',$request->order)->first();

        $quotation = Quotation::where('order_idorder',$order->idorder)->first();
        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();
        $payment->status = 3;
        $payment->saveOrFail();

        $bitacora = globalNewBitacora('Payment Approval','payment',$payment->idpayment);

        return Redirect::to('/admin-order/'.$order->idorder);
    }

    public function paymentProceed($order_number){

        $user = Auth::user();
        $order = Order::where('order_number',$order_number)->first();
        $payment = Payment::where('order_idorder',$order->idorder)->first();
        $quotation = Quotation::where('order_idorder',$order->idorder)->first();
        $package = Package::where('quotation_idquotation',$quotation->idquotation)->first();
        // dd($payment);
        return view('payment.panel')->with([
            'order'=>$order,
            'payment'=>$payment,
            'payment'=>$payment,
        ]);
        if($order->users_id == $user->id){
            return view('payment.panel')->with('order',$order);
        }else{
            return Redirect::to('/user-order/'.$order->idorder);
        }
    }

    public function receipt(Request $request){

        if(str_contains($request->req_reference_number,'Evento_15_Ene'))
        {
            if($request->reason_code == 100){
                $event_number = explode("_", $request->req_reference_number)[3];

                $neonet_transaction = new NeonetTransaction($request->all());
                $neonet_transaction->payment_idpayment = 0;
                $neonet_transaction->saveOrFail();

                $event = Event::where('number',$event_number)->first();
                $event->receipt = $request->auth_trans_ref_no;
                $event->save();

                $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
                $mailtrap = new MailtrapClient(new Config($apiKey));

                $date = Carbon::now()->toDateTimeString();
                $number = random_int(100000,999999);
                $appointment_number = $number.'-'.$date;

                $data = $event;

                $html = view('mail.registerNewEvent', $data)->render();

                $email = (new Email())
                    ->from(new EmailAddress('events@gruposgl.com', 'EventosGruposSGL'))
                    ->to(new EmailAddress($data->email))
                    ->bcc('madelaine.aquino@gruposgl.com','alex.galindo@gruposgl.com')
                    ->subject("Registro Evento".'-'.$appointment_number)
                    ->html($html)
                ;

                try {
                    $response = $mailtrap->sending()->emails()->send($email);
                } catch (\Exception $e) {

                }

                return view('payment.receipt')->with([
                    'response'=>$request,
                ]);
            }
            else
            {
                return view('payment.error');
            }
        }
        elseif(str_contains($request->req_reference_number,'PSGL'))
        {
            if($request->reason_code == 100){
                $neonet_transaction = new NeonetTransaction($request->all());
                $neonet_transaction->payment_idpayment = 0;
                $neonet_transaction->saveOrFail();

                return view('payment.receipt')->with([
                    'response'=>$request,
                ]);
            }
            else
            {
                return view('payment.error');
            }
        }
        else
        {
            $order = Order::where('order_number',$request->req_reference_number)->first();

            if($order->type == 5){
                $success = $this->storeOrder($request,$order);

                if($success){
                    return view('payment.receipt')->with([
                        'response'=>$request,
                        'order'=>$order,
                    ]);
                }else{
                    return view('payment.error');
                }
            }else{
                $success = $this->normalOrder($request,$order);

                if($success){
                    return view('payment.receipt')->with([
                        'response'=>$request,
                        'order'=>$order,
                    ]);
                }else{
                    return view('payment.error');
                }
            }
        }
    }

    public function normalOrder($request,$order){
        if($request->reason_code == 100){
            $payment = Payment::where('order_idorder',$order->idorder)->first();
            $payment->status = 3;
            $payment->saveOrFail();

            $neonet_transaction = new NeonetTransaction($request->all());
            $neonet_transaction->payment_idpayment = $payment->idpayment;
            $neonet_transaction->saveOrFail();

            $response = [
                'auth_trans_ref_no'=>$request->auth_trans_ref_no,
                'req_reference_number'=>$request->req_reference_number,
                'card_type_name'=>$request->card_type_name,
                'req_card_number'=>$request->req_card_number,
                'req_bill_to_forename'=>$request->req_bill_to_forename,
                'req_bill_to_surname'=>$request->req_bill_to_surname,
                'req_currency'=>$request->req_currency,
                'auth_amount'=>$request->auth_amount,
            ];

            return true;
        }else{
            return false;
        }
    }

    public function storeOrder($request,$order){
        if($request->reason_code == 100){
            $cart = Cart::where('users_id',Auth::user()->id)->where('status',1)->update(array('status' => 0));
            Session::forget('cart');
            Session::save();

            $order->status = 2;
            $order->saveOrFail();

            $payment = Payment::where('order_idorder',$order->idorder)->first();
            $payment->status = 3;
            $payment->saveOrFail();

            $neonet_transaction = new NeonetTransaction($request->all());
            $neonet_transaction->payment_idpayment = $payment->idpayment;
            $neonet_transaction->saveOrFail();
            $response = [
                'auth_trans_ref_no'=>$request->auth_trans_ref_no,
                'req_reference_number'=>$request->req_reference_number,
                'card_type_name'=>$request->card_type_name,
                'req_card_number'=>$request->req_card_number,
                'req_bill_to_forename'=>$request->req_bill_to_forename,
                'req_bill_to_surname'=>$request->req_bill_to_surname,
                'req_currency'=>$request->req_currency,
                'auth_amount'=>$request->auth_amount,
            ];

            return true;
        }else{
            return false;
        }
    }

    public function getTotal($order){
        $payments = Payment::where('order_idorder',$order)->get();

        $total = $payments->first()->total;
        foreach ($payments->where('type',5) as $key => $p) {
            $total += $p->total;
        }

        return($total);
    }

    public function isolated_payment()
    {
        return view('payment.isolated_payment');
    }
}
