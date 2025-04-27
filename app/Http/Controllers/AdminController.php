<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Billing;
use App\Models\Invoice;
use App\Models\Tracking;
use App\Models\Exchange;
use App\Models\CityTable;
use App\Models\Quotation;
use App\Models\Membership;
use Illuminate\Support\Str;
use App\Models\PackageTable;
use Illuminate\Http\Request;
use App\Models\DistrictTable;
use App\Models\TrackingStates;
use App\Models\TrackingStatus;
use App\Models\MembershipTable;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    // ADMIN ORDERS(nac,pobox)
    public function mainDashboard()
    {
        return view('admin.orders');
    }

    public function quotationsIndex()
    {
        return view('admin.adminQuotations');
    }

    public function ordersIndex()
    {
        return view('admin.adminOrders');
    }

    public function costCenter()
    {
        return view('admin.costCenter');
    }

    public function generateQuotations()
    {
        return view('admin.generateQuotations');
    }

    public function order($idorder)
    {
        $order = Order::find($idorder);

        if($order->type == 1 || $order->type == 2 || $order->type == 3 || $order->type == 4)
        {
            $data = $this->getOrderData($idorder);
        }else{
            $data = $this->getNewStoreOrderData($idorder);
        }
        return view('admin.order')->with($data->getData());
    }

    public function getOrderData($idorder)
    {
        $order = Order::query()
        ->where('order.idorder',$idorder)
        ->leftJoin('quotation','quotation.order_idorder','=','order.idorder')
        ->leftJoin('invoice','invoice.order_idorder','=','order.idorder')
        ->leftJoin('billing','billing.order_idorder','=','order.idorder')
        ->leftJoin('tracking','tracking.order_idorder','=','order.idorder')
        ->leftJoin('tracking_status', function ($leftJoin) {
            $leftJoin->on('tracking_status.tracking_idtracking', '=', 'tracking.idtracking');
        })
        ->select(
            'order.idorder',
            'order.order_number',
            'order.type AS order_type',
            'order.status AS order_status',
            'order.created_at AS order_created_at',
            'quotation.idquotation',
            'quotation.service',
            'quotation.order_idorder',
            'tracking.idtracking',
            'tracking.tracking_number',
            'tracking_status.state AS last_status',
            'invoice.idinvoice',
            'invoice.tracking',
            'invoice.keyword',
            'billing.idbilling',
            'billing.name AS billing_name',
            'billing.nit AS billing_nit',
            'billing.address AS billing_address',
            )
        ->first();

        $address = DB::table('address')
        ->where('quotation_idquotation',$order->idquotation)
        ->get();

        $packages = DB::table('package')
        ->where('quotation_idquotation',$order->idquotation)
        ->get();

        foreach ($packages as $key => $package) {
            if($package->type)
            {
                $package_table = PackageTable::find($package->type);
                $package->size = $package_table->size_max;
                $package->weight = $package_table->weight_max;
            }
        }

        $payment = $this->getPayment($order);

        return view('user.order')->with([
            'order'=>$order,
            'packages'=>$packages,
            'address'=>$address,
            'payment'=>$payment,
        ]);
    }

    public function getNewStoreOrderData($idorder)
    {
        $order = Order::query()
        ->where('order.idorder',$idorder)
        ->leftJoin('quotation','quotation.order_idorder','=','order.idorder')
        ->select(
            'order.idorder',
            'order.order_number',
            'order.status AS order_status',
            'order.type AS order_type',
            'order.created_at AS order_created_at',
            'order.users_id',
            'quotation.order_idorder',
            )
        ->first();

        // Fix this to lock enter address and not get the last one
        $address = Address::query()
        ->where('users_id',$order->users_id)
        ->where('type', '5')
        ->where('status',1)
        ->orderBy('created_at', 'desc')
        ->first();


        if($address->departamento && $address->municipio)
        {
            $departamento = DistrictTable::where('iddistrict_table',$address->departamento)->first();
            $address->departamento = $departamento->departamento;

            $municipio = CityTable::where('idcity_table',$address->municipio)->first();
            $address->municipio = $municipio->name;
        }

        $cart = Cart::query()
        ->leftJoin('product','product.idproduct','=','cart.product_idproduct')
        ->where('cart.order_idorder',$order->idorder)
        ->get();

        $payment = $this->getPayment($order);

        return view('user.order')->with([
            'order'=>$order,
            'cart'=>$cart,
            'address'=>$address,
            'payment'=>$payment,
        ]);
    }

    public function orderConfirm(Request $request)
    {
        $order = Order::findOrFail($request->idorder);
        $order->status = 3;
        $order->saveOrFail();

        $this->addNewTracking($request,$order);

        return back();
    }

    public function orderDelete(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->status = 0;
        $order->saveOrFail();

        return Redirect::to('/admin-index');
    }
    // END ADMIN ORDERS

    // SUPPORT FUNCTIONS
    public function getPayment($order)
    {
        $payment = Payment::query();

        $order->order_idorder ?
        $payment->where('quotation_idquotation',$order->idquotation)
        :
        $payment->where('order_idorder',$order->idorder);

        $total = $payment->first()->total;

        $order->order_idorder ?
        $total_cod = Payment::query()->where('quotation_idquotation',$order->idquotation)->where('type',9)->first()
        :
        $total_cod = Payment::query()->where('order_idorder',$order->idorder)->where('type',9)->first();

        return(['payment'=>$payment->first(), 'total'=>$total, 'total_cod'=>$total_cod]);
    }

    public function addExtraPayment(Request $request)
    {
        $order = Order::findOrFail($request->idorder);

        $quotation = Quotation::where('order_idorder',$request->idorder)->first();

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();

        $user_membership = Membership::where('users_id',$order->users_id)->latest()->first();
        $rates = DB::table('membership_table')->where('idmembership_table',$user_membership->type)->first();

        // Type 5 => Extra_payment
        $request->merge(['type'=>5]);
        $total = $rates->clearance;

        $currency = $payment->currency;
        $currency == '$'? $total = $total:$total = $total*($payment->exchange);

        $request->merge(['total'=>$total]);
        $request->request->add(['quotation_idquotation'=>$quotation->idquotation]);
        $request->request->add(['currency'=>$currency]);
        $request->request->add(['comments'=>'Gastos de desconsolidacion en origen']);
        $request->request->add(['status'=>'1']);
        $payment = globalNewPayment($request);

        return Redirect::to('/admin-order/'.$request->idorder);
    }

    public function addNewTracking($request,$order)
    {
        do {
            $tracking_number = 'SGLTRACK3194'.random_int(1000000,9999999);
        } while (Tracking::where('tracking_number','=',$tracking_number)->exists());

        $request->request->add(['service'=>$order->type]);
        $request->request->add(['tracking_number'=> $tracking_number]);
        $request->request->add(['order_idorder'=> $order->idorder]);
        $request->request->add(['order_number'=>$order->order_number]);
        $request->request->add(['status'=>'1']);
        $tracking = globalnewTracking($request);

        $service = $tracking->service;

        $tracking_states = TrackingStates::where('service',$service)->first();

        $request->merge(['status' =>'status_1']);
        $request->request->add(['state'=>$tracking_states->status_1]);
        $request->request->add(['tracking_idtracking'=>$tracking->idtracking]);
        $tracking_status = globalnewTrackingStatus($request);
    }
    // END SUPPORT FUNCTIONS


    // ADMIN STORE(all include)
    public function storeIndex()
    {
        return view('admin.store.index');
    }

    public function storeQuotations()
    {
        $quotations = DB::table('quotation')
        ->join('order', 'order.idorder', '=', 'quotation.order_idorder')
        ->where('order.type',4)
        ->select('quotation.order_idorder','quotation.email','order.idorder')
        ->get();

        $orders = Order::query()
        ->where(function ($query) {
            $query->where('status', 1)
                ->orWhere('status', 7);
        })
        ->where('type',4)
        ->orderBy('created_at', 'desc');

        $orders = $orders->paginate(7);

        $today = Carbon::now();

        return view('admin.store.quotations')->with(['orders'=>$orders,'today'=>$today, 'quotations'=>$quotations]);
    }

    public function storeQuotation($order_number)
    {
        $order = Order::where('order_number',$order_number)
        ->where('type',4)
        ->first();

        $quotation = Quotation::where('order_idorder',$order->idorder)->first();

        $package = Package::where('quotation_idquotation',$quotation->idquotation)->first();

        $payment = Payment::where('quotation_idquotation',$quotation->idquotation)->first();

        $rates = globalGetRates();

        return view('admin.store.quotation')->with([
            'order'=>$order,
            'quotation'=>$quotation,
            'package'=>$package,
            'payment'=>$payment,
            'rates'=>$rates,
        ]);
    }
    // END ADMIN STORE

    // ADMIN DASHBOARD
    public function dashboard()
    {
        // Change Free Tier Rates Index URL
        $exchange = DB::table('exchange')->where('currency','US')->first();
        $rates = DB::table('membership_table')->where('idmembership_table',1)->first();
        $rates->exchange = $exchange->value;

        return view('admin.dashboard')->with(['rates' => $rates]);;
    }

    public function updateRates(Request $request)
    {
        // Change Free Tier Rates POST URL
        // Find Free Tier Membership
        $membership_table = MembershipTable::findOrFail(1);
        $membership_table->fill($request->all())->save();

        $exchange = Exchange::findOrFail(1);
        $exchange->value = $request->exchange;
        $exchange->saveOrFail();

        return Redirect::to('/admin-dashboard');
    }
    // END ADMIN DASHBOARD

    // USERS PANEL
    public function usersIndex()
    {
        $users_client = User::where('role','Cliente')->where('email_verified_at','!=',null)->get();

        return view('admin.users.index')->with(['clients' => $users_client]);
    }
    // END USERS PANEL
}
