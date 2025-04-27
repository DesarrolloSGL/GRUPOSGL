<?php

use App\Models\OSC;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Billing;
use App\Models\Address;
use App\Models\Package;
use App\Models\Tracking;
use App\Models\Bitacora;
use App\Models\Quotation;
use App\Models\Membership;
use App\Models\PackageTable;
use App\Models\TrackingStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

function globalNewBitacora($_action,$_table,$_idtable){
    try {
        $bitacora = new Bitacora();
        Auth::check()?
        $bitacora->iduser = Auth::user()->id:
        $bitacora->iduser = 0;
        $bitacora->action = $_action;
        $bitacora->table = $_table;
        $bitacora->idtable = $_idtable;
        $bitacora->saveOrFail();
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewQuotation($request){
    try {
        $validator = Validator::make($request->all(), [
            // fix Miami China for sender
            // 'sender' => 'sometimes',
            'destination' => 'sometimes',
            'service' => 'sometimes|numeric|min:1|max:3',
            'currency' => 'sometimes|regex:/^[Q,$]$/',
            'terms' => 'sometimes|accepted',
            'order_idorder' => 'sometimes|numeric|min:1',
        ]);


        if(!$validator->fails()) {
            $request->idquotation?
            $old_quotation = Quotation::findOrFail($request->idquotation):
            $old_quotation = new Quotation();

            $quotation = Quotation::updateOrCreate([
                'idquotation' => $request->get('idquotation'),
            ],[
                'sender' => $request->get('sender',$old_quotation->sender),
                'destination' => $request->get('destination',$old_quotation->destination),
                'service' => $request->get('service',$old_quotation->service),
                'terms' => $request->get('terms',$old_quotation->terms),
                'order_idorder' => $request->get('order_idorder',$old_quotation->order_idorder)
            ]);
            return $quotation;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewPackage($request){
    try {
        $validator = Validator::make($request->all(), [
            'type' => 'sometimes|numeric|min:1|max:6',
            // fixed null link
            // 'link' => 'sometimes|url',
            // 'bill' => 'sometimes|numeric|min:1|max:1',
            // 'size' => 'sometimes|regex:/^([[0-9]{1,})(-)([0-9]{1,})$/',
            'fragile' => 'sometimes|boolean',
            'dangerous' => 'sometimes|boolean',
            'perishable' => 'sometimes|boolean',
            'width' => 'sometimes|numeric|min:1',
            'height' => 'sometimes|numeric|min:1',
            'depth' => 'sometimes|numeric|min:1',
            'price' => 'sometimes|numeric',
            'shipping' => 'sometimes|numeric',
            // 'weight' => 'sometimes|numeric|min:1',
            // 'detail' => 'sometimes|numeric|min:1',
            'quotation_idquotation' => 'sometimes|numeric'
        ]);
        if(!$validator->fails()) {

            $request->idpackage?
            $old_package = Package::findOrFail($request->idpackage):
            $old_package = new Package();


            $package = Package::updateOrCreate([
                'idpackage' => $request->get('idpackage'),
            ],[
                'type' => $request->get('type',$old_package->type),
                'units' => $request->get('units',$old_package->units),
                'link' => $request->get('link',$old_package->link),
                'fragile' => $request->get("fragile",$old_package->fragile),
                'dangerous' => $request->get('dangerous',$old_package->dangerous),
                'perishable' => $request->get('perishable',$old_package->perishable),
                'width' => $request->get('width',$old_package->width),
                'height' => $request->get('height',$old_package->height),
                'depth' => $request->get('depth',$old_package->depth),
                'price' => $request->get('price',$old_package->price),
                'shipping' => $request->get('shipping',$old_package->shipping),
                'weight' => $request->get('weight',$old_package->weight),
                'detail' => $request->get('description',$old_package->detail),
                'quotation_idquotation' => $request->get('quotation_idquotation',$old_package->quotation_idquotation),
            ]);

            return $package;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewOrder($request){
    try {

        $validator = Validator::make($request->all(), [
            'type' => 'sometimes|numeric|min:1|max:5',
        ]);


        if(!$validator->fails()) {
            $request->idorder?
            $old_order = Order::findOrFail($request->idorder):
            $old_order = new Order();

            $order = Order::updateOrCreate([
                'idorder' => $request->get('idorder'),
            ],[
                'order_number' => $request->get('order_number',$old_order->order_number),
                'type' => $request->get('type',$old_order->type),
                'status' => $request->get('status',$old_order->status),
                'users_id' => Auth::user()->id,
                'adviser_id' => $request->get('adviser_id',$old_order->adviser_id),
            ]);

            $bitacora = globalNewBitacora('New/Update Order','order',$order->idorder);

            return $order;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewAddress($request){
    try {

        $validator = Validator::make($request->all(), [
            // 'type' => 'sometimes|numeric|min:1|max:5',
        ]);


        if(!$validator->fails()) {
            $request->idaddress?
            $old_address = Address::findOrFail($request->idaddress):
            $old_address = new Address();

            $address = Address::updateOrCreate([
                'idaddress' => $request->get('idaddress'),
            ],[
                'type' => $request->get('type',$old_address->type),
                'address' => $request->get('address',$old_address->address),
                'departamento' => $request->get('departamento',$old_address->departamento),
                'municipio' => $request->get('municipio',$old_address->municipio),
                'name' => $request->get('name',$old_address->name),
                'phone' => $request->get('phone',$old_address->phone),
                'email' => $request->get('email',$old_address->email),
                'cui' => $request->get('cui',$old_address->cui),
                'date' => $request->get('date',$old_address->date),
                'time' => $request->get('time',$old_address->time),
                'comments' => $request->get('comments',$old_address->comments),
                'status' => $request->get('status',$old_address->status),
                'users_id' => $request->get('users_id',$old_address->users_id),
                'quotation_idquotation' => $request->get('quotation_idquotation',$old_address->quotation_idquotation),

            ]);
            return $address;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewPayment($request){
    try {
        $validator = Validator::make($request->all(), [
            'total' => 'sometimes|numeric',
        ]);


        if(!$validator->fails()) {
            $request->idpayment?
            $old_payment = Payment::findOrFail($request->idpayment):
            $old_payment = new Payment();

            $payment = Payment::updateOrCreate([
                'idpayment' => $request->get('idpayment'),
            ],[
                'type' => $request->get('type',$old_payment->type),
                'total' => $request->get('total',$old_payment->total),
                'currency' => $request->get("currency",$old_payment->currency),
                'currency_text' => $request->get("currency_text",$old_payment->currency_text),
                'exchange' => $request->get("exchange",$old_payment->exchange),
                'bank_total' => $request->get('bank_total',$old_payment->bank_total),
                'status' => $request->get('status',$old_payment->status),
                'comments' => $request->get('comments',$old_payment->comments),
                'quotation_idquotation' => $request->get('quotation_idquotation',$old_payment->quotation_idquotation),
                'order_idorder' => $request->get('order_idorder',$old_payment->order_idorder),
            ]);
            return $payment;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewOsc($request){
    try {

        $validator = Validator::make($request->all(), [
        ]);


        if(!$validator->fails()) {
            $request->idosc?
            $old_osc = OSC::findOrFail($request->idosc):
            $old_osc = new OSC();

            $osc = OSC::updateOrCreate([
                'idosc' => $request->get('idosc'),
            ],[
                'transport' => $request->get('transport',$old_osc->transport),
                'clearance' => $request->get('clearance',$old_osc->clearance),
                'insurance' => $request->get('insurance',$old_osc->insurance),
                'dai' => $request->get('dai',$old_osc->dai),
                'iva' => $request->get('iva',$old_osc->iva),
                'total' => $request->get('total',$old_osc->total),
                'duca' => $request->get('duca',$old_osc->duca),
                'sed' => $request->get('sed',$old_osc->sed),
                'status' => $request->get('status',$old_osc->status),
                'order_idorder' => $request->get('order_idorder',$old_osc->order_idorder),
            ]);
            return $osc;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewInvoice($request){
    try {
        $validator = Validator::make($request->all(), [
            'value' => 'numeric',
            'tracking' => 'required',
            'keyword' => 'required',
            'new' => 'numeric|min:1|max:2',
            'insurance' => 'numeric|min:1|max:2',
            'divided' => 'numeric|min:1|max:2',
        ]);


        if(!$validator->fails()) {
            $request->idinvoice?
            $old_invoice = Invoice::findOrFail($request->idinvoice):
            $old_invoice = new Invoice();

            $invoice = Invoice::updateOrCreate([
                'idinvoice' => $request->get('idinvoice'),
            ],[
                'order_number' => $request->get('order_number',$old_invoice->order_number),
                'value' => $request->get('value',$old_invoice->value),
                'tracking' => $request->get('tracking',$old_invoice->tracking),
                'keyword' => $request->get('keyword',$old_invoice->keyword),
                'new' => $request->get('new',$old_invoice->new),
                'insurance' => $request->get('insurance',$old_invoice->insurance),
                'divided' => $request->get('divided',$old_invoice->divided),
                'file' => $request->get('file',$old_invoice->file),
                'package_idpackage' => $request->get('package_idpackage',$old_invoice->package_idpackage),
                'order_idorder' => $request->get('order_idorder',$old_invoice->order_idorder),
            ]);
            return $invoice;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewBilling($request){
    try {
        $validator = Validator::make($request->all(), [
            'total' => 'sometimes|numeric',
        ]);


        if(!$validator->fails()) {
            $request->idbilling?
            $old_billing = Billing::findOrFail($request->idbilling):
            $old_billing = new Billing();

            $billing = Billing::updateOrCreate([
                'idbilling' => $request->get('idbilling'),
            ],[
                'billing_number' => $request->get('billing_number',$old_billing->billing_number),
                'total' => $request->get('total',$old_billing->total),
                'nit' => $request->get('nit',$old_billing->nit),
                'cui' => $request->get('cui',$old_billing->cui),
                'name' => $request->get('name',$old_billing->name),
                'address' => $request->get('address',$old_billing->address),
                'comments' => $request->get('comments',$old_billing->comments),
                'status' => $request->get('status',$old_billing->status),
                'order_idorder' => $request->get('order_idorder',$old_billing->order_idorder),
                'promo_idpromo' => $request->get('promo_idpromo',$old_billing->promo_idpromo),
            ]);

            return $billing;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewTracking($request){
    try {
        $validator = Validator::make($request->all(), [
            // 'total' => 'sometimes|numeric',
        ]);


        if(!$validator->fails()) {
            $request->idtracking?
            $old_tracking = Tracking::findOrFail($request->idtracking):
            $old_tracking = new Tracking();

            $tracking = Tracking::updateOrCreate([
                'idtracking' => $request->get('idtracking'),
            ],[
                'service' => $request->get('service',$old_tracking->service),
                'tracking_number' => $request->get('tracking_number',$old_tracking->tracking_number),
                'hbl' => $request->get('hbl',$old_tracking->hbl),
                'mbl' => $request->get('mbl',$old_tracking->mbl),
                'awb' => $request->get('awb',$old_tracking->awb),
                'order_number' => $request->get('order_number',$old_tracking->order_number),
                'order_idorder' => $request->get('order_idorder',$old_tracking->order_idorder),
                'users_id' => $request->get('users_id',$old_tracking->users_id),
                'status' => $request->get('status',$old_tracking->status),
            ]);

            return $tracking;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalNewTrackingStatus($request){
    try {
        $validator = Validator::make($request->all(), [
            // 'total' => 'sometimes|numeric',
        ]);


        if(!$validator->fails()) {
            $request->idtracking_status?
            $old_tracking_status = TrackingStatus::findOrFail($request->idtracking_status):
            $old_tracking_status = new TrackingStatus();


            $tracking_status = TrackingStatus::updateOrCreate([
                'idtracking_status' => $request->get('idtracking_status'),
            ],[
                'state' => $request->get('state',$old_tracking_status->state),
                'status' => $request->get('status',$old_tracking_status->status),
                'tracking_idtracking' => $request->get('tracking_idtracking',$old_tracking_status->tracking_idtracking),
            ]);

            globalNewBitacora('New Tracking Status','tracking_status',$tracking_status->idtracking_status);

            return $tracking_status;
        }
    }catch(\Exception $e){
        DB::rollback();
    }
}

function globalRandomOrderNumber(){
    do {
        $random = random_int(10000000,99999999);
    } while (Order::where('order_number','=',$random)->exists());

    return $random;
}

function globalGetRates(){

    // Membresía
    if(Auth::check()){
        $user_membership = Membership::where('users_id',Auth::user()->id)->latest()->first();
        $rates = DB::table('membership_table')->where('idmembership_table',$user_membership->type)->first();
    }else{
        $rates = DB::table('membership_table')->where('idmembership_table',1)->first();
    }

    // EndMembresía

    // Exchange
    $exchange = DB::table('exchange')->where('currency','US')->first()->value;
    $rates->exchange = $exchange;


    unset($rates->created_at);
    unset($rates->idmembership_table);
    unset($rates->level);
    unset($rates->name);
    unset($rates->points);
    unset($rates->shipping);
    unset($rates->updated_at);


    return ($rates);
}