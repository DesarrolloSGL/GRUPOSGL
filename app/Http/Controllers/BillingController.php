<?php

namespace App\Http\Controllers;

use DB;
use URL;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Billing;
use App\Models\Payment;
use App\Models\Package;
use Illuminate\Http\File;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;



class BillingController extends Controller
{
    public function index(){
        return view('billing.uploadInvoice');
    }

    public function upload(Request $request){
        $invoice_file = $request->file('invoice');
        $store_path = Storage::put('/packages/invoices', $invoice_file, 'private');
        $request->request->add(['file'=>$store_path]);

        $order = Order::where('order_number', $request->order_number);

        if($order->exists()){
            $order = $order->first();
            $request->request->add(['order_idorder'=>$order->idorder]);
            $invoice = globalNewInvoice($request);

            if(Auth::user()->hasRole('client')){
                return Redirect::to('/user-order/'.$order->idorder);
            }else{
                return Redirect::to('/admin-order/'.$order->idorder);
            }
            // Fix's This
            // return Redirect::to('/user-order/'.$order->idorder);
            return Redirect::back();
        }else{
            $request->request->add(['order_number'=>$request->order_number]);
            $invoice = globalNewInvoice($request);

            return Redirect::to('/upload-invoice');
        }
    }

    public function uploadFromOrder($order_number){
        $order = Order::where('order_number',$order_number)->first();

        $quotation = Quotation::where('order_idorder',$order->idorder)->first();

        $package = Package::where('quotation_idquotation',$quotation->idquotation)->first();

        $value = $package->price;

        $user_id = Auth::user()->id;

        // Filter by user and pobox service
        if($order->users_id == $user_id ||
            (Auth::user()->hasRole('super-admin')) ||
            (Auth::user()->hasRole('admin')) ||
            (Auth::user()->hasRole('operator')) ||
            (Auth::user()->hasRole('accounting'))
        ){
            return view('billing.uploadInvoice')->with(['order'=>$order,'value'=>$value]);
        }else{
            return Redirect::to('/');
        }
    }

    // Factura de Servicio
    public function uploadServiceInvoice(Request $request){

        $billing = Billing::findOrFail($request->idbilling);

        if($request->file('invoice')){
            $invoice_file = $request->file('invoice');
            $store_path = Storage::put('/service/invoices', $invoice_file, 'private');

            $billing->file = $store_path;
            $billing->saveOrFail();
        }

        return Redirect::to('/admin-order/'.$billing->order_idorder);
    }

    public function loadInvoice($idorder){
        $invoice = Invoice::where('order_idorder',$idorder)->latest('created_at')->first();
        $file_name = explode('/',$invoice->file)[2];

        // dd($invoice);
        try {
            Storage::copy($invoice->file, "public/packages/invoices/".$file_name);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return \Response::json(URL::to('/').'/storage/packages/invoices/'.$file_name);
        // return Redirect::to('/storage/package_bills/'.$file_name);
        // Storage::delete("public/package_bills/".$file_name);
    }

    public function deleteInvoice(Request $request){
        $invoice = Invoice::where('order_idorder',$request->idorder)->latest('created_at')->first();

        $file_name = explode('/',$invoice->file)[2];
        Storage::delete("public/packages/invoices/".$file_name);
        return \Response::json('Ok');
    }

    // Service Invoice
    public function loadServiceInvoice($idorder){
        $billing = Billing::where('order_idorder',$idorder)->latest('created_at')->first();
        $file_name = explode('/',$billing->file)[2];

        try {
            Storage::copy($billing->file, "public/service/invoices/".$file_name);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return \Response::json(URL::to('/').'/storage/service/invoices/'.$file_name);
        // return Redirect::to('/storage/package_bills/'.$file_name);
        // Storage::delete("public/package_bills/".$file_name);
    }

    public function deleteServiceInvoice(Request $request){
        $billing = Billing::where('order_idorder',$request->idorder)->latest('created_at')->first();

        $file_name = explode('/',$billing->file)[2];
        Storage::delete("public/service/invoices/".$file_name);
        return \Response::json('Ok');
    }


    public function uploadBankNote(Request $request){
        $order = Order::where('order_number',$request->order_number)->first();
        $payment = Payment::where('order_idorder',$order->idorder)->first();

        if($request->file('bank_note')){
            $bank_note = $request->file('bank_note');
            $store_path = Storage::put('/payment/notes', $bank_note, 'private');
            $payment->bank_note = $store_path;
            $payment->saveOrFail();
        }

        return Redirect::to('/admin-order/'.$order->idorder);
    }

    // Bank Note
    public function loadBankNote($idorder){
        $payment = Payment::where('order_idorder',$idorder)->latest('created_at')->first();
        $file_name = explode('/',$payment->bank_note)[2];

        try {
            Storage::copy($payment->bank_note, "public/payment/note/".$file_name);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return \Response::json(URL::to('/').'/storage/payment/note/'.$file_name);
        // return Redirect::to('/storage/package_bills/'.$file_name);
        // Storage::delete("public/package_bills/".$file_name);
    }

    public function deleteBankNote(Request $request){
        $payment = Payment::where('order_idorder',$request->idorder)->latest('created_at')->first();

        $file_name = explode('/',$payment->bank_note)[2];
        Storage::delete("public/payment/note/".$file_name);
        return \Response::json('Ok');
    }
}
