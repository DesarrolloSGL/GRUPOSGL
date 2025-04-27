<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Session;
use App\Models\OSC;
use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use App\Models\Billing;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Tracking;
use Illuminate\Http\File;
use App\Models\Quotation;
use App\Models\Membership;
use App\Models\DistrictTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class MiamiQuoterController extends Controller
{
    public function index(){
        if(Session::get('quotation')){
            $quotation = Session::get('quotation');
            $packages = Session::get('packages');
            return view('quoters.national.index')->with(['quotation'=>$quotation,'packages'=>$packages]);
        }else{
            return view('quoters.national.index');
        }
    }

    public function quotation(Request $request){
        $request->request->add(['sender'=>'Miami']);
        $request->currency ? $request->request->add(['currency_text' => 'USD']):$request->request->add(['currency_text' => 'GTQ']);
        $request->currency ? $request->request->add(['currency' => '$']):$request->request->add(['currency' => 'Q']);
        $request->terms ? $request->request->add(['terms'=>1]):false;
        // New Quotation
        $quotation = globalNewQuotation($request);

        $request->request->add(['quotation_idquotation'=>$quotation->idquotation]);
        // New Package
        $package = globalNewPackage($request);

        $total = $this->total($quotation->idquotation,$request->currency,false);

        $request->request->add(['total'=>$total['total']]);
        $request->request->add(['exchange'=>$total['exchange']]);
        $request->request->add(['status'=>1]);
        $payment = globalNewPayment($request);


        $payment ? Session::put('idquotation', $quotation->idquotation):false;

        return \Response::json($request);
    }

    public function order(Request $request){
        $idquotation = Session::get('idquotation');
        $request->request->add(['idquotation'=>$idquotation]);
        // Set request->type = 2 miami quoter, status 1 initial, order_number higher
        $request->request->add(['type'=>2]);
        $request->request->add(['status'=>1]);

        do {
            $random = random_int(10000000,99999999);
        } while (Order::where('order_number','=',$random)->exists());

        $request->request->add(['order_number'=>'SGLMIA'.$random]);
        // Create new Order
        $order = globalnewOrder($request);
        // Set idorder
        $request->request->add(['order_idorder'=>$order->idorder]);

        $quotation = globalnewQuotation($request);

        $address = $this->newAddress($request,'_destination');

        $payment = Payment::where('quotation_idquotation',$idquotation)->first();
        $total = $payment->total;

        $request = $this->newOsc($quotation,$payment->currency,$request);
        $osc = globalNewOsc($request);

        // Envio
        $this->newShipping($payment,$request);

        return \Response::json(['total'=>$total,'service'=>$quotation->service,'currency'=>$payment->currency]);
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
        }
    }

    public function newAddress($request,$_suffix){
        $quotation = Quotation::findOrFail($request->idquotation);

        $agency_destination = DistrictTable::findOrFail($quotation->destination);

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

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();

        // Payment
        $request->request->add(['idpayment'=>$payment->idpayment]);
        // $request->request->add(['type'=>$request->payment_mg]);
        $request->request->add(['status'=>2]);
        $request->request->add(['order_idorder'=>$quotation->order_idorder]);
        $update_payment = globalnewPayment($request);
        $request->request->remove('type');

        // Billing
        $request->request->add(['name'=>$request->bill_name]);

        $request->bill_cf ? $request->request->add(['nit'=>'CF']):
        $request->request->add(['nit'=>$request->bill_nit]);

        $request->request->add(['address'=>$request->bill_address]);

        $billing = globalnewBilling($request);

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

    public function oscPdf($idquotation=null)
    {
        $idquotation?
        $quotation = Quotation::findOrFail($idquotation):
        $quotation = Quotation::findOrFail(Session::get('idquotation'));

        $payments = $this->getPayment($quotation);

        $order = Order::findOrFail($quotation->order_idorder);

        $US = DB::table('exchange')
        ->where('currency','US')
        ->first()->value;
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
            $currency == 'Q' ? $osc['shipping'] = $package->shipping*$US:$osc['shipping'] = $package->shipping;

            $osc['weight'] = $package->weight;
            $osc['payments'] = $payments;
            $osc['billing'] = $billing;
            $osc['address'] = $address;
            $osc['order_number'] = $order->order_number;
        }

        // dd($osc);

        $pdf = PDF::loadView('quoters.oscMiamiPdf', $osc);

        return $pdf->stream('File.pdf');
    }

    public function getPayment($quotation){
        $payments = Payment::where('quotation_idquotation',$quotation->idquotation)->get();

        $total = $payments->first()->total;
        foreach ($payments->where('type',5) as $key => $p) {
            $total += $p->total;
        }

        return(['payments'=>$payments, 'total'=>$total]);
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

        $commission = 0;
        $service == 2 ?
        $commission = ($_price)*0.12:
        false;

        $duca = 0;
        $_price > 1000.00 ?
        $duca = 1495/$US:
        $duca = 0;

        $sed = 0;
        $_price > 2500.00 ?
        $sed = 401.50/$US:
        $sed = 0;

        // Membresía
        $user_membership = Membership::where('users_id',Auth::user()->id)->latest()->first();
        $rates = DB::table('membership_table')->where('idmembership_table',$user_membership->type)->first();
        // EndMembresía


        $transport = $_weight * $rates->cost_per_pound_miami;
        $desaduanaje = $rates->clearance;
        $insurance = ($_price + $transport) * 0.022;
        $services = $transport + $desaduanaje;
        $dai = ($_price + $transport + $insurance) * ($_dai/100);
        $iva = ($_price + $insurance + $transport + $dai) * 0.12;
        $taxes = $dai + $iva;
        $subtotal = $services + $taxes + $insurance - $iva;
        $total_pobox = $_shipping + $services + $taxes + $insurance + $duca + $sed;
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
}


