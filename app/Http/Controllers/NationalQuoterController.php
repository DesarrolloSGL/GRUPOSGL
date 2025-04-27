<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Session;
use App\Models\OSC;
use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Billing;
use App\Models\Tracking;
use App\Models\CityTable;
use App\Models\ZoneTable;
use App\Models\Quotation;
use App\Models\DistrictTable;
use App\Models\PackageTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NationalQuoterController extends Controller
{
    public function quotation(Request $request){
        // $request
        // "sender_city" => "0"
        // "sender_zone" => "0"
        // "sender_location" => "23"
        // "destination_city" => "8"
        // "destination_zone" => "38"
        // "destination_location" => "1"
        // "pk_1_1" => "on"
        // "units_1" => "1"
        $request = $this->locationMapping($request);
        // $request
        // "pk_1_1" => "on"
        // "units_1" => "1"
        // "sender" => "23-0-0"
        // "destination" => "1-8-38"

        // New Quotation
        $quotation = globalNewQuotation($request);
        // Set idquotation from new quotation
        $request->request->add(['quotation_idquotation' => $quotation->idquotation]);
        // $request
        // "quotation_idquotation" => 77

        // Set all the packages and returning last one
        $packages = $this->newPackage($request);
        // Set Total from packages
        $total = $this->total($quotation->idquotation);
        // Set new payment
        $request->request->add(['currency' => 'Q']);
        $request->request->add(['currency_text' => 'GTQ']);
        $request->request->add(['total'=>$total]);
        $request->request->add(['status'=>1]);
        // $request
        // "currency" => "Q"
        // "total" => 30.00
        $payment = globalNewPayment($request);
        // Set Session idquotation
        $request->request->remove('quotation_idquotation');

        Session::put('idquotation', $quotation->idquotation);

        return \Response::json($request);
    }

    public function quotationOrder(Request $request){
        // Set idquotation
        // request
        // terms => "on"
        $idquotation = Session::get('idquotation');
        $request->request->add(['idquotation'=>$idquotation]);
        // "terms" => "on"
        // "idquotation" => 81
        // Set request->type = 1 national quoter, status 1 initial, order_number higher
        $request->request->add(['type'=>1]);
        $request->request->add(['status'=>1]);
        // "terms" => "on"
        // "idquotation" => 81
        // "type" => 1
        // "status" => 1
        do {
            $random = random_int(10000000,99999999);
        } while (Order::where('order_number','=',$random)->exists());

        $request->request->add(['order_number'=>'SGLGUA'.$random]);
        // Create new Order
        // "terms" => "on"
        // "idquotation" => 81
        // "type" => 1
        // "status" => 1
        // "order_number" => "SGLGUA87376582"
        $order = globalnewOrder($request);
        // Set idorder
        $request->request->add(['order_idorder'=>$order->idorder]);
        // "terms" => "on"
        // "idquotation" => 81
        // "type" => 1
        // "status" => 1
        // "order_number" => "SGLGUA87376582"
        // "order_idorder" => 59
        $request->terms ? $request->request->add(['terms'=>1]):false;
        $quotation = globalnewQuotation($request);
        // "terms" => 1
        // "idquotation" => 81
        // "type" => 1
        // "status" => 1
        // "order_number" => "SGLGUA40134153"
        // "order_idorder" => 60
        $sender = explode('-',$quotation->sender);
        $destination = explode('-',$quotation->destination);
        if($sender[0] > 22){
            $agency_sender_data = DistrictTable::findOrFail($sender[0]);
        }else{
            $agency_sender_data = DistrictTable::findOrFail($sender[0]);
            $city_sender = CityTable::findOrFail($sender[1]);
            $zone_sender = ZoneTable::find($sender[2]);
            $zone_sender ?
            $agency_sender_data->municipio = $city_sender->name.' '.$zone_sender->name:
            $agency_sender_data->municipio = $city_sender->name;
        }


        if($destination[0] > 22){
            $agency_destination_data = DistrictTable::findOrFail($destination[0]);
        }else{
            $agency_destination_data = DistrictTable::findOrFail($destination[0]);
            $city_destination = CityTable::findOrFail($destination[1]);
            $zone_destination = ZoneTable::find($destination[2]);
            $zone_destination ?
            $agency_destination_data->municipio = $city_destination->name.' '.$zone_destination->name:
            $agency_destination_data->municipio = $city_destination->name;
        }
        $data = [];

        $sender[0] == 1 ?
        $data_sender=['location'=>'sender','type'=>'blank','address'=>'','departamento'=>$agency_sender_data->departamento,'municipio'=>$agency_sender_data->municipio]:
        $data_sender=['location'=>'sender','type'=>'fill','address'=>$agency_sender_data->agency.','.$agency_sender_data->address,'departamento'=>$agency_sender_data->departamento,'municipio'=>$agency_sender_data->municipio];


        $destination[0] == 1 ?
        $data_destination=['location'=>'destination','type'=>'blank','address'=>'','departamento'=>$agency_destination_data->departamento,'municipio'=>$agency_destination_data->municipio]:
        $data_destination=['location'=>'destination','type'=>'fill','address'=>$agency_destination_data->agency.','.$agency_destination_data->address,'departamento'=>$agency_destination_data->departamento,'municipio'=>$agency_destination_data->municipio];

        $data = [[$data_sender],[$data_destination]];
        return \Response::json($data);
    }

    public function quotationOSC(Request $request){
        // $request
        // "address_sender" => "7a sdfñlkasjdfñlkasdjf"
        // "name_sender" => "Kevin"
        // "lastname_sender" => "Armas"
        // "phone_sender" => "55964658"
        // "email_sender" => "kevinarmas7@gmail.com"
        // "cui_sender" => "3003644230101"
        // "comments_sender" => null
        // "date_sender" => "2024-01-16"
        // "address_destination" => "Direccion Entrega"
        // "name_destination" => "Kevin"
        // "lastname_destination" => "Armas"
        // "phone_destination" => "55964658"
        // "email_destination" => "kevinarmas7@gmail.com"
        // "cui_destination" => "3003644230101"
        $quotation = Quotation::findOrFail(Session::get('idquotation'));
        $request->request->add(['idquotation'=>$quotation->idquotation]);

        $address_sender = $this->newAddress($request,'_sender');
        $address_destination = $this->newAddress($request,'_destination');

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();
        $total = $payment->total;

        $request->request->add(['total'=>$total]);
        $request->request->add(['order_idorder'=>$quotation->order_idorder]);
        $osc = globalNewOsc($request);
        return \Response::json(['total'=>$total]);
    }

    public function quotationFinish(Request $request){
        // "bill_name" => "Kevin"
        // "bill_lastname" => "Kevin"
        // "bill_address" => "Guatemala, Guatemala"
        // "bill_nit" => "95912223"
        $quotation = Quotation::findOrFail(Session::get('idquotation'));

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();
        // Payment
        $request->request->add(['idpayment'=>$payment->idpayment]);
        // $request->request->add(['type'=>$request->payment_cn]);
        $request->request->add(['status'=>2]);
        $request->request->add(['order_idorder'=>$quotation->order_idorder]);
        $update_payment = globalnewPayment($request);
        $request->request->remove('type');

        // Billing
        $request->request->add(['name'=>$request->bill_name.' '.$request->bill_lastname]);

        $request->bill_cf ? $request->request->add(['nit'=>'CF']):
        $request->request->add(['nit'=>$request->bill_nit]);

        $request->request->add(['address'=>$request->bill_address]);

        $billing = globalnewBilling($request);

        // Order
        $request->request->add(['idorder'=>$quotation->order_idorder]);
        $request->request->add(['status'=>'2']);
        $update_order = globalnewOrder($request);

        session()->forget('idquotation');

        if($request->accept_cod_charge && $request->cod_price != "")
        {
            // Set new payment
            // type 10 = Pago Contra Entrega.
            $request->request->remove('idpayment');
            $request->request->remove('status');
            $request->request->add(['type' => '9']);
            $request->request->add(['quotation_idquotation' => $quotation->idquotation]);
            $request->request->add(['currency' => $update_payment->currency]);
            $request->request->add(['total'=>$request->cod_price]);
            $request->request->add(['comments'=>'Costo Mercaderia A Cobrar(COD)']);
            $payment = globalNewPayment($request);
        }
        return \Response::json(['order'=>$quotation->order_idorder]);
    }

    public function newPackage($request){
        $packages = [];
        foreach ($request->all() as $key => $value) {
            if(strpos($key,'pk_') === 0){
                // Get package type pk_1_[1]
                $type = explode('_',$key)[2];
                // Get package correlative pk_[1]_1
                $correlative = explode('_',$key)[1];
                // Set package type, type from PackageTable(DB)
                $request->request->add(['type' => $type]);
                // Set package fragile, dangerous and/or perishable
                $request['fr_'.$correlative] ? $request->request->add(['fragile' => 1]):$request->request->add(['fragile' => 0]);
                $request['dg_'.$correlative] ? $request->request->add(['dangerous' => 1]):$request->request->add(['dangerous' => 0]);
                $request['ps_'.$correlative] ? $request->request->add(['perishable' => 1]):$request->request->add(['perishable' => 0]);
                $request->request->add(['units' => $request['units_'.$correlative]]);

                // Add package to array packages
                array_push($packages, globalNewPackage($request));
            }
        }
        $request->request->remove('type');
        $request->request->remove('fragile');
        $request->request->remove('dangerous');
        $request->request->remove('perishable');
        return $packages;
    }

    public function newAddress($request,$_suffix){
        $quotation = Quotation::findOrFail($request->idquotation);

        $sender = explode('-',$quotation->sender);
        $destination = explode('-',$quotation->destination);


        $_suffix == '_sender'?
        $agency = DistrictTable::findOrFail($sender[0]):
        $agency = DistrictTable::findOrFail($destination[0]);

        $agency->type == 1?
        $request->request->add(['address' => $request->get('address'.$_suffix)]):
        $request->request->add(['address' => $agency->agency.' '.$agency->address]);

        $request->request->add(['departamento' => $agency->departamento]);
        $request->request->add(['municipio' => $agency->municipio]);

        $request->request->add(['status' => 1]);

        $_suffix == '_sender' ?
        $request->request->add(['type' => 1]):
        $request->request->add(['type' => 2]);

        $request->request->add(['name' => $request->get('name'.$_suffix).' '.$request->get('lastname'.$_suffix) ]);
        $request->request->add(['phone' => $request->get('phone'.$_suffix)]);
        $request->request->add(['email' => $request->get('email'.$_suffix)]);
        $request->request->add(['cui' => $request->get('cui'.$_suffix)]);
        $request->request->add(['comments' => $request->get('comments'.$_suffix)]);
        $request->request->add(['date' => $request->get('date'.$_suffix)]);
        $request->request->add(['users_id' => Auth::user()->id]);
        $request->request->add(['quotation_idquotation' => $quotation->idquotation]);

        $address = globalNewAddress($request);

        return $address;
    }

    public function locationMapping($request){
        $sender = join("-",[$request->sender_location,$request->sender_city,$request->sender_zone]);
        $destination = join("-",[$request->destination_location,$request->destination_city,$request->destination_zone]);

        $request->request->remove('sender_location');
        $request->request->remove('sender_city');
        $request->request->remove('sender_zone');
        $request->request->remove('destination_location');
        $request->request->remove('destination_city');
        $request->request->remove('destination_zone');

        $request->request->add(['sender'=>$sender]);
        $request->request->add(['destination'=>$destination]);

        return $request;
    }

    public function oscPdf($idquotation=null)
    {

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
            $billing = Billing::where('order_idorder',$quotation->order_idorder)->first();
            $addresses = Address::where('quotation_idquotation',$quotation->idquotation)->get();
            $packages = Package::where('quotation_idquotation',$quotation->idquotation)->get();

            $osc = OSC::where('order_idorder',$quotation->order_idorder)
            ->first();
        }
        $osc->order_number = $order->order_number;
        $osc->payments = $payments;
        $osc->billing = $billing;
        $osc->addresses = $addresses;
        $osc->packages = $packages;
        $osc = $osc->getAttributes();

        $pdf = PDF::loadView('quoters.oscNationalPdf', $osc);

        return $pdf->stream('File.pdf');
    }

    public function getPayment($quotation){
        $payments = Payment::where('quotation_idquotation',$quotation->idquotation)->get();

        $total = $payments->first()->total;
        $extra_total = 0;
        foreach ($payments->where('type',5) as $key => $p) {
            $total += $p->total;
            $extra_total += $p->total;
        }

        return(['payments'=>$payments, 'total'=>$total ,'extra_total'=>$extra_total]);
    }

    public function total($idquotation)
    {
        $quotation = Quotation::findOrFail($idquotation);

        $packages = Package::where('quotation_idquotation', $idquotation)
        ->get();

        $price_tag = $this->getPackagePrice($quotation);

        $packages_total = 0;
        foreach ($packages as $key => $package) {
            $package_table = PackageTable::findOrFail($package->type);
            $price = $package_table[$price_tag];
            $package->price = $price;
            $package->detail = $package_table['name'];
            $package->saveOrFail();
            $packages_total += $price*$package->units;
        }

        return $packages_total;
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

    public function getPackagePrice($quotation){
        $locations = ['sender','destination'];
        foreach ($locations as $key => $value) {
            // location, zone
            $location = explode('-',$quotation[$value])[0];
            $zone = explode('-',$quotation[$value])[2];

            // Agencies
            $location > 22 ? $quotation[$value] = 4:false;

            // District , Cities, Zones
            if($location <= 22 ){
                if($zone){
                    // zone -> type == metro, muni, red, agency
                    $quotation[$value] = ZoneTable::findOrFail($zone)->type;
                }else{
                    // 2 == municipal
                    $quotation[$value] = 2;
                }
            }
        }

        $combination = join('-',[$quotation['sender'],$quotation['destination']]);
        $price_tag = $this->getPriceTag($combination);

        return $price_tag;
    }

    public function getPriceTag($t){
        $package_table = array(
                "1-1" => "price_metro",
                "1-2" => "price_muni",
                "1-3" => "price_red",
                "1-4" => "price_muni",
                "2-1" => "price_muni",
                "2-2" => "price_muni",
                "2-3" => "price_red",
                "2-4" => "price_muni",
                "3-1" => "price_red",
                "3-2" => "price_red",
                "3-3" => "price_red",
                "3-4" => "price_red",
                "4-1" => "price_metro",
                "4-2" => "price_muni",
                "4-3" => "price_red",
                "4-4" => "price_agency",
            );

        return $package_table[$t];
    }
}

