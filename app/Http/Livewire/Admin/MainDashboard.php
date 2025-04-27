<?php

namespace App\Http\Livewire\Admin;

use DB;
use URL;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
// Models
use App\Models\Order;
use App\Models\Billing;
use App\Models\Payment;
use App\Models\Quotation;
use App\Models\User;

class MainDashboard extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search,$type,$status,$created,$finish;
    public $uploadedNote = false;
    public $order_number_test = '';
    public $payment_status;
    public $aproval_user;

    public function render()
    {
        $orders = $this->getOrders();

        $today = Carbon::now();

        return view('livewire.admin.main-dashboard')->with([
            'orders'=>$orders,
            'today'=>$today,
        ]);
    }


    public function getOrders()
    {
        $search = $this->search;

        $orders = Order::query()
        ->leftJoin('quotation','quotation.order_idorder','=','order.idorder')
        ->leftJoin('tracking','tracking.order_idorder','=','order.idorder')
        ->leftJoin('users','users.id','=','order.users_id')
        ->leftJoin('billing','billing.order_idorder','=','order.idorder')
        ->leftJoin('invoice', function ($leftJoin) {
            $leftJoin->on('invoice.order_idorder', '=', 'order.idorder')
            ->where('invoice.created_at', '=', DB::raw("(select max(`created_at`) from invoice)"));
        })
        ->leftJoin('payment', function ($leftJoin) {
            // $leftJoin->on('payment.order_idorder', '=', 'order.idorder');
            $leftJoin->on('payment.quotation_idquotation', '=', 'quotation.idquotation')
            ->where('payment.type',null);
            // ->whereBetween('payment.type', ['1','4']);
        })
        ->select(
            'order.idorder',
            'order.order_number',
            'order.type AS order_type',
            'order.status',
            'order.created_at',
            'users.name AS user_name',
            'users.last_name AS user_lastname',
            'invoice.order_number AS invoice_order',
            'payment.status AS payment_status',
            'payment.idpayment',
            'payment.total',
            'payment.currency',
            'tracking.tracking_number',
            'tracking.idtracking',
            'billing.file as billing_file',
        )
        ->where(function ($query) use($search) {
            $query->where('order.order_number', 'like', '%'. $search .'%')
               ->orWhere('users.name', 'like', '%'. $search .'%')
               ->orWhere('users.last_name', 'like', '%'. $search .'%')
               ->orWhere('tracking.tracking_number', 'like', '%'. $search .'%');
        })
        ->orderBy('order.created_at', 'desc');

        // dd($orders->where('order.order_number','SGLMIA32783115')->get());

        $this->type ? $orders = $orders->where('order.type',$this->type):false;
        $this->status ? $orders = $orders->where('order.status',$this->status):$orders = $orders->whereBetween('order.status', ['2','4']);

        if($this->created && $this->finish)
        {
            ($orders = $orders->whereBetween('order.created_at', [$this->created,$this->finish]));
        }else{
            if($this->created)
            {
                ($orders = $orders->whereDate('order.created_at','=' ,$this->created));
            }
            elseif($this->finish)
            {
                ($orders = $orders->whereDate('order.created_at','<=',$this->finish));
            }
        }

        $orders = $orders->paginate(20);

        return $orders;
    }

    public function getBankStatus($order_number)
    {
        $order = Order::where('order_number',$order_number)->first();
        $quotation = Quotation::where('order_idorder',$order->idorder)->first();
        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();
        $payment->bank_note ? $this->uploadedNote = true:$this->uploadedNote = false;

        $this->order_number_test = $order->order_number;

        $this->payment_status = $payment->status;
        $user = User::find($payment->user);
        $user ? $this->aproval_user = $user->name.' '.$user->last_name:$this->aproval_user = '';
    }

    public $file = [];
    public function uploadFile()
    {
        $order = Order::where('order_number',$this->order_number_test)->first();
        $quotation = Quotation::where('order_idorder',$order->idorder)->first();
        $payment = Payment::where('quotation_idquotation',$quotation->idquotation);

        $file = $this->file;
        $file ? $extension = '.'.$file[0]->extension():$extension = '';

        $path = Storage::put('/payment', $file[0], 'private');

        $payment->update(['bank_note'=>$path]);

        // $billing->file = $path;
        // $billing->saveOrfail();

        $payment->first()->bank_note ? $this->uploadedNote = true:$this->uploadedNote = false;

        $this->file = [];
    }

    public function ApprovePayment()
    {
        $order = Order::where('order_number',$this->order_number_test)->first();
        $quotation = Quotation::where('order_idorder',$order->idorder)->first();
        $payment = Payment::where('quotation_idquotation',$quotation->idquotation);
        $payment->update(['status'=>3]);
        $payment->update(['user'=>Auth::user()->id]);

        $this->payment_status = $payment->first()->status;
        $user = User::find($payment->first()->user);
        $user ? $this->aproval_user = $user->name.' '.$user->last_name:false;
    }

    public function SuperApprovePayment()
    {
        $order = Order::where('order_number',$this->order_number_test)->first();
        $quotation = Quotation::where('order_idorder',$order->idorder)->first();
        $payment = Payment::where('quotation_idquotation',$quotation->idquotation);
        $payment->update(['status'=>3]);
        $payment->update(['user'=>Auth::user()->id]);

        $this->payment_status = $payment->first()->status;
        $user = User::find($payment->first()->user);
        $user ? $this->aproval_user = $user->name.' '.$user->last_name:false;
    }


    public function downloadNote()
    {
        $order = Order::where('order_number',$this->order_number_test)->first();
        $quotation = Quotation::where('order_idorder',$order->idorder)->first();
        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();

        $file_name = explode('/', $payment->bank_note)[1];
        $extension = explode('.',$file_name)[1];

        try {
            Storage::copy($payment->bank_note, 'public/payment/' . $file_name);
        } catch (\Throwable $th) {

        }

        $name = 'BankNote_'.$order->order_number.'.'.$extension;
        return response()->download('storage/payment/'.$file_name,$name);
    }



    // PENDING...
    public function watchNote()
    {
        $invoice = Invoice::where('order_idorder',$idorder)->latest('created_at')->first();
        $file_name = explode('/',$invoice->file)[2];

        // dd($invoice);
        try {
            Storage::copy($invoice->file, "public/packages/invoices/".$file_name);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return \Response::json(URL::to('/').'/storage/packages/invoices/'.$file_name);
    }

    public function deleteNote()
    {
        $invoice = Invoice::where('order_idorder',$request->idorder)->latest('created_at')->first();

        $file_name = explode('/',$invoice->file)[2];
        Storage::delete("public/packages/invoices/".$file_name);
        return \Response::json('Ok');
    }

    public function clear(){
        $this->search = '';
        $this->type = '';
        $this->status = '';
        $this->created = '';
        $this->finish = '';
    }
}
