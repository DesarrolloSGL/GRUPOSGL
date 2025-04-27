<?php

namespace App\Http\Controllers;

use Mail;
use Session;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Mailtrap\Config;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Mailtrap\EmailHeader\CategoryHeader;

// use Mailtrap\Config;
// use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\EmailHeader\CustomVariableHeader;
// use Mailtrap\Helper\ResponseHelper;
// use Mailtrap\MailtrapClient;
// use Symfony\Component\Mime\Address;
// use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Header\UnstructuredHeader;

// quality-control@gruposgl.com

class MailController extends Controller
{
    // Deposit Form
    public function depositForm(Request $request){
        $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
        $mailtrap = new MailtrapClient(new Config($apiKey));
        $data = $this->depositFormTranslateData($request);
        $date = Carbon::now()->toDateTimeString();
        $number = random_int(100000,999999);
        $data["form_number"] = $number.'-'.$date;
        $html = view('mail.depositForm', $data)->render();

        $files = $this->depositFormAddFiles($request);

        $email = (new Email())
        ->from(new Address('notification@gruposgl.com', 'GruposSGL'))
        ->to(new Address("kevinarmas7@gmail.com"))
        ->subject('Solicitud de depósitos en garantía'.'-'.$number.'-'.$date)
        ->html($html)
        ;

        foreach ($files as $key=>$file){
            $email->attachFromPath($file,$file->name);
        }

        $email->getHeaders()
        ->add(new CategoryHeader('Integration Test'))
        ;

        $response = $mailtrap->sending()->emails()->send($email);

        $html_client = view('mail.formSuccess', $data)->render();
        $email_client = (new Email())
        ->from(new Address('notification@gruposgl.com', 'GruposSGL'))
        ->to(new Address($data['client_email']))
        ->subject('Solicitud de depósitos en garantía'.'-'.$number.'-'.$date)
        ->html($html_client)
        ;

        $response = $mailtrap->sending()->emails()->send($email_client);

        Session::flash('form_success', true);
        return Redirect::to('/deposit-form');
        dd('Mail Send Successfully !!');
    }

    public function depositFormTranslateData($request){
        $request = $request->all();

        // Claim Type
        $request['currency'] == 1 ? $request['currency'] = 'Q':false;
        $request['currency'] == 2 ? $request['currency'] = '$':false;

        foreach ($request as $key => $value) {
            if($key != '_token'){
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function depositFormAddFiles($request){
        $files = $request->files;

        foreach ($files as $key=>$file){
            $temp_file = $request->file($key);

            $extension = $temp_file->extension();
            $key == 'bank_deposit' ? $name = 'Soporte de deposito bancario':false;
            $key == 'request_letter' ? $name = 'Carta de solicitud de reintegro':false;

            $file->name = $name.'.'.$extension;
        }
        return $files;
    }

    // Claim Form
    public function claimForm(Request $request){
        $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
        $mailtrap = new MailtrapClient(new Config($apiKey));

        $date = Carbon::now()->toDateTimeString();
        $number = random_int(100000,999999);
        $data = $this->claimFormTranslateData($request);
        $data["form_number"] = $number.'-'.$date;
        // $data["client_name"] = Auth::user()->name.' '.Auth::user()->last_name;
        // $data["client_email"] = Auth::user()->email;
        $html = view('mail.claimForm', $data)->render();
        $email = (new Email())
            ->from(new Address('notification@gruposgl.com', 'GruposSGL'))
            ->to(new Address("kevinarmas7@gmail.com"))
            ->subject('Formulario Reclamo'.'-'.$number.'-'.$date)
            ->html($html)
        ;

        $email->getHeaders()
            ->add(new CategoryHeader('Integration Test'))
        ;

        $response = $mailtrap->sending()->emails()->send($email);

        $html_client = view('mail.formSuccess', $data)->render();
        $email_client = (new Email())
        ->from(new Address('notification@gruposgl.com', 'GruposSGL'))
        ->to(new Address($data['client_email']))
        ->subject('Formulario Reclamo'.'-'.$number.'-'.$date)
        ->html($html_client)
        ;

        $response = $mailtrap->sending()->emails()->send($email_client);

        Session::flash('form_success', true);
        return Redirect::to('/claim-form');
        dd('Mail Send Successfully !!');
    }

    public function claimFormTranslateData($request){
        $request = $request->all();

        // Claim Type
        $request['claim_type'] == 1 ? $request['claim_type'] = 'Servicio al cliente':false;
        $request['claim_type'] == 2 ? $request['claim_type'] = 'Facturación':false;
        $request['claim_type'] == 3 ? $request['claim_type'] = 'Operaciones':false;
        $request['claim_type'] == 4 ? $request['claim_type'] = 'Asesor comercial':false;
        $request['claim_type'] == 5 ? $request['claim_type'] = 'Administrativo':false;
        $request['claim_type'] == 6 ? $request['claim_type'] = 'Mensajero':false;
        $request['claim_type'] == 7 ? $request['claim_type'] = 'Tramitador de puerto':false;
        $request['claim_type'] == 8 ? $request['claim_type'] = 'Piloto de camión':false;
        $request['claim_type'] == 9 ? $request['claim_type'] = 'General':false;

        // Country
        $request['country'] == 1 ? $request['country'] = 'Guatemala':false;
        $request['country'] == 2 ? $request['country'] = 'El Salvador':false;
        $request['country'] == 3 ? $request['country'] = 'Honduras':false;
        $request['country'] == 4 ? $request['country'] = 'Costa Rica':false;
        $request['country'] == 5 ? $request['country'] = 'Panama':false;
        $request['country'] == 6 ? $request['country'] = 'Nicaragua':false;
        $request['country'] == 7 ? $request['country'] = 'Belice':false;
        $request['country'] == 8 ? $request['country'] = 'R.Dominicana':false;
        $request['country'] == 9 ? $request['country'] = 'USA':false;
        $request['country'] == 10 ? $request['country'] = 'Chile':false;
        $request['country'] == 11 ? $request['country'] = 'Brasil':false;
        $request['country'] == 12 ? $request['country'] = 'Colombia':false;
        $request['country'] == 13 ? $request['country'] = 'Jamaica':false;

        // Service Type
        $request['service_type'] == 1 ? $request['service_type'] = 'LCL':false;
        $request['service_type'] == 2 ? $request['service_type'] = 'FCL':false;
        $request['service_type'] == 3 ? $request['service_type'] = 'Terrestre':false;
        $request['service_type'] == 4 ? $request['service_type'] = 'Aduana':false;
        $request['service_type'] == 5 ? $request['service_type'] = 'Aéreo':false;
        $request['service_type'] == 6 ? $request['service_type'] = 'Courier':false;
        $request['service_type'] == 7 ? $request['service_type'] = 'Paquetería Nacional':false;
        $request['service_type'] == 8 ? $request['service_type'] = 'Tramites aduanales':false;

        $request = $this->claimFormTranslateRating($request);
        // Discount
        // dd($request);

        foreach ($request as $key => $value) {
            if($key != '_token'){
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function claimFormTranslateRating($request){
        foreach ($request as $key => $value) {
            strpos($key, 'consultant') === 0 ? $request[explode("_", $key)[0]] = explode("_", $key)[1]:false;
            strpos($key, 'price') === 0 ? $request[explode("_", $key)[0]] = explode("_", $key)[1]:false;
            strpos($key, 'followUp') === 0 ? $request[explode("_", $key)[0]] = explode("_", $key)[1]:false;
            strpos($key, 'tools') === 0 ? $request[explode("_", $key)[0]] = explode("_", $key)[1]:false;
        }
        return $request;
    }

    // Refund Form
    public function refundForm(Request $request){
        $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
        $mailtrap = new MailtrapClient(new Config($apiKey));
        $data = $this->refundFormTranslateData($request);
        $date = Carbon::now()->toDateTimeString();
        $number = random_int(100000,999999);
        // $data["client_name"] = Auth::user()->name.' '.Auth::user()->last_name;
        // $data["client_email"] = Auth::user()->email;
        $data["form_number"] = $number.'-'.$date;
        $html = view('mail.refundForm', $data)->render();

        $files = $this->refundFormAddFiles($request)->all();
        // $files['invoice']->filename = 'asd.png';
        // dd($files['invoice']->getFileName());

        $email = (new Email())
            ->from(new Address('notification@gruposgl.com', 'GruposSGL'))
            ->to(new Address("kevinarmas7@gmail.com"))
            ->subject('Formulario Reintegro'.'-'.$number.'-'.$date)
            ->html($html)
            // ->attachFromPath($files['invoice'],'sas.png')
        ;

        foreach ($files as $key=>$file){
            $email->attachFromPath($file,$file->name);
        }

        $email->getHeaders()
            ->add(new CategoryHeader('Integration Test'))
        ;

        $response = $mailtrap->sending()->emails()->send($email);

        $html_client = view('mail.formSuccess', $data)->render();
        $email_client = (new Email())
        ->from(new Address('notification@gruposgl.com', 'GruposSGL'))
        ->to(new Address($data['buyer_email']))
        ->subject('Formulario Reintegro'.'-'.$number.'-'.$date)
        ->html($html_client)
        ;

        $response = $mailtrap->sending()->emails()->send($email_client);

        Session::flash('form_success', true);
        return Redirect::to('/refund-form');
        dd('Mail Send Successfully !!');
    }

    public function refundFormTranslateData($request){
        $request = $request->all();

        // Service Type
        $request['service_type'] == 1 ? $request['service_type'] = 'Aéreo':false;
        $request['service_type'] == 2 ? $request['service_type'] = 'Courier':false;
        $request['service_type'] == 3 ? $request['service_type'] = 'FCL':false;
        $request['service_type'] == 4 ? $request['service_type'] = 'LCL':false;
        $request['service_type'] == 5 ? $request['service_type'] = 'Terrestre':false;
        $request['service_type'] == 6 ? $request['service_type'] = 'Aduana':false;
        $request['service_type'] == 7 ? $request['service_type'] = 'Seguro':false;
        $request['service_type'] == 8 ? $request['service_type'] = 'Brokerage':false;
        $request['service_type'] == 9 ? $request['service_type'] = 'Tienda en Linea':false;

        // Reclaim Type
        $request['claim_type'] == 1 ? $request['claim_type'] = 'Pérdida parcial de mercancías':false;
        $request['claim_type'] == 2 ? $request['claim_type'] = 'Pérdida total':false;
        $request['claim_type'] == 3 ? $request['claim_type'] = 'Nunca recibi mi mercancía':false;
        $request['claim_type'] == 4 ? $request['claim_type'] = 'Se cobro mas de lo cotizado':false;
        $request['claim_type'] == 5 ? $request['claim_type'] = 'No recibi deposito en garantía':false;

        // Secure Payment
        $request['secure_payment'] == 1 ? $request['secure_payment'] = 'Sí':false;
        $request['secure_payment'] == 2 ? $request['secure_payment'] = 'No':false;

        // Refund Received
        $request['refund_received'] == 1 ? $request['refund_received'] = 'Sí':false;
        $request['refund_received'] == 2 ? $request['refund_received'] = 'No':false;

        // Refund Type
        $request['refund_type'] == 1 ? $request['refund_type'] = 'Transferencia bancaria':false;
        $request['refund_type'] == 2 ? $request['refund_type'] = 'Cheque':false;

        // Refund Currency
        $request['refund_currency'] == 1 ? $request['refund_currency'] = 'QTZ':false;
        $request['refund_currency'] == 2 ? $request['refund_currency'] = 'USD':false;

        // Discount
        array_key_exists('discount',$request) ? $request['discount'] = 'Sí': $request['discount'] ='No';

        $request['payment_type'] = $this->refundFormPaymentTypeArray($request['payment_type']);

        foreach ($request as $key => $value) {
            if($key != '_token'){
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function refundFormPaymentTypeArray($request){
        foreach ($request as $key => $value) {
            $value == 0 ? $value = 'No Ingreso Dato':false;
            $value == 1 ? $value = 'Tarjeta credito/debito':false;
            $value == 2 ? $value = 'Efectivo':false;
            $value == 3 ? $value = 'Transferencia Bancaria':false;
            $value == 4 ? $value = 'Paypal':false;
            $value == 5 ? $value = 'Puntos Bancarios':false;
            $value == 6 ? $value = 'Tarjeta prepago de regalo':false;
            $request[$key] = $value;
        }
        return $request;
    }

    public function refundFormAddFiles($request){
        $files = $request->files;

        foreach ($files as $key=>$file){
            $temp_file = $request->file($key);

            $extension = $temp_file->extension();
            $key == 'invoice' ? $name = 'Factura_de_compra':false;
            $key == 'package_slip' ? $name = 'Factura_cobro_sgl':false;
            $key == 'sgl_invoice' ? $name = 'Packing_slip':false;
            $key == 'legal_dpi' ? $name = 'DPI_propietario':false;

            $file->name = $name.'.'.$extension;
        }
        return $files;
    }

    // Business Form

    public function businessForm(Request $request)
    {
        $apiKey = '5e260d63e70586c30a6bb2ff8d4250e7';
        $mailtrap = new MailtrapClient(new Config($apiKey));
        $data = $this->businessFormTranslateData($request);
        $date = Carbon::now()->toDateTimeString();
        $number = random_int(100000,999999);
        $data["form_number"] = $number.'-'.$date;
        $html = view('mail.businessForm', $data)->render();

        $files = $this->businessFormAddFiles($request);

        $email = (new Email())
        ->from(new Address('notification@gruposgl.com', 'GruposSGL'))
        ->to(new Address("kevinarmas7@gmail.com"))
        ->subject('Formulario de Disputas'.'-'.$number.'-'.$date)
        ->html($html)
        ;

        foreach ($files as $key=>$file){
            $email->attachFromPath($file,$file->name);
        }

        $email->getHeaders()->add(new CategoryHeader('Integration Test'));

        $response = $mailtrap->sending()->emails()->send($email);

        $html_client = view('mail.formSuccess', $data)->render();
        $email_client = (new Email())
        ->from(new Address('notification@gruposgl.com', 'GruposSGL'))
        ->to(new Address($data['client_email']))
        ->subject('Formulario de Disputas'.'-'.$number.'-'.$date)
        ->html($html_client)
        ;

        $response = $mailtrap->sending()->emails()->send($email_client);

        Session::flash('form_success', true);
        return Redirect::to('/deposit-form');
        dd('Mail Send Successfully !!');
    }

    public function businessFormTranslateData($request)
    {
        $request = $request->all();

        foreach ($request as $key => $value) {
            if($key != '_token'){
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function businessFormAddFiles($request)
    {
        $files = $request->files;

        foreach ($files as $key=>$file){
            $temp_file = $request->file($key);

            $extension = $temp_file->extension();
            $key == 'invoice_file' ? $name = 'Factura':false;
            $key == 'quotation_file' ? $name = 'Cotización':false;
            $key == 'ocap_file' ? $name = 'OCAP':false;
            $key == 'aditional_file' ? $name = 'Archivo Adicional':false;

            $file->name = $name.'.'.$extension;
        }
        return $files;
    }
}

//
    // Deposit Form
    // public function depositForm(Request $request){
    //     $data = $this->depositFormTranslateData($request);

    //     $date = Carbon::now()->toDateTimeString();
    //     $number = random_int(100000,999999);
    //     $data["title"] = "Solicitud de depósitos en garantía".'-'.$number.'-'.$date;
    //     $data["email"] = ["kevinarmas7@gmail.com"];
    //     $data["form_number"] = $number.'-'.$date;

    //     $files = $this->depositFormAddFiles($request);

    //     Mail::send('mail.DepositForm', $data, function($message)use($data, $files) {
    //         $message->to($data["email"])
    //                 ->subject($data["title"]);

    //         foreach ($files as $key=>$file){
    //             $message->attach($file, array(
    //                 'as' => $file->name,
    //             ));
    //         }
    //     });

    //     Mail::send('mail.FormSuccess', $data, function($message)use($data) {
    //         $message->to($data['client_email'])
    //                 ->subject($data["title"]);
    //     });

    //     Session::flash('form_success', true);
    //     return Redirect::to('/deposit-form');
    //     dd('Mail Send Successfully !!');
    // }


        // public function claimForm(Request $request){
    //     $data = $this->claimFormTranslateData($request);
    //     $date = Carbon::now()->toDateTimeString();
    //     $number = random_int(100000,999999);
    //     $data["title"] = "Formulario Reclamo".'-'.$number.'-'.$date;
    //     $data["email"] = "kevinarmas7@gmail.com";
    //     $data["client_name"] = Auth::user()->name.' '.Auth::user()->last_name;
    //     $data["client_email"] = Auth::user()->email;
    //     // $data["form_number"] = $number.'-'.$date;



    //     Mail::send('mail.FormSuccess', $data, function($message)use($data) {
    //         $message->to(Auth::user()->email)
    //                 ->subject($data["title"]);
    //     });

    //     Session::flash('form_success', true);
    //     return Redirect::to('/claim-form');
    //     dd('Mail Send Successfully !!');
    // }

        // public function refundForm(Request $request){
    //     $data = $this->refundFormTranslateData($request);
    //     $date = Carbon::now()->toDateTimeString();
    //     $number = random_int(100000,999999);
    //     $data["title"] = "Formulario Reintegro".'-'.$number.'-'.$date;
    //     $data["email"] = "kevinarmas7@gmail.com";
    //     $data["form_number"] = $number.'-'.$date;


    //     $files = $this->refundFormAddFiles($request);

    //     Mail::send('mail.RefundForm', $data, function($message)use($data, $files) {
    //         $message->to($data["email"])
    //                 ->subject($data["title"]);

    //         foreach ($files as $key=>$file){
    //             $message->attach($file, array(
    //                 'as' => $file->name,
    //             ));
    //         }
    //     });


    //     Mail::send('mail.FormSuccess', $data, function($message)use($data) {
    //         $message->to($data['buyer_email'])
    //                 ->subject($data["title"]);
    //     });


    //     Session::flash('form_success', true);
    //     return Redirect::to('/refund-form');
    //     dd('Mail Send Successfully !!');
    // }
//