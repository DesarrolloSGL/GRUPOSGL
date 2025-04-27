<?php

namespace App\Http\Controllers;


use DB;
use Session;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Locker;
use App\Models\Payment;
use App\Models\Billing;
use App\Models\Address;
use App\Models\Package;
use App\Models\Invoice;
use App\Models\Tracking;
use App\Models\CityTable;
use App\Models\Quotation;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Models\PackageTable;
use App\Models\DistrictTable;
use App\Models\TrackingStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{

    // ACCOUNT FUNCTIONS
    public function register(Request $request) {
        try
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^[a-zA-Z\s]*$/',
                'last_name' => 'required|regex:/^[a-zA-Z\s]*$/',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'country' => 'required|numeric|min:1|max:14',
                // 'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-,.]).{6,}$/', 'min:6', 'confirmed'],
            ],[
                'name.required' => 'Debes colocar tu nombre',
                'last_name.required' => 'Debes colocar tu apellido',
                'email.required' => 'Debes colocar tu email',
                'country.min' => 'Debes seleccionar tu país',
                // 'password.required' => 'Debes colocar tu password',
            ]);

            if($validator->fails()) {
                Session::flash('error', $validator->messages()->all());
                return Redirect::to('/register');
            }else{
                $user = new User($request->except('password'));
                $user->password = bcrypt($request->get('password'));
                $user->role = 'Cliente';
                $user->status = '1';
                $user->assignRole('client');
                $user->saveOrFail();

                $unique = $this->lockerNumber();

                $locker = new Locker();
                $locker->type = $request->country;
                $locker->number = $unique;
                $locker->status = 1;
                $locker->users_id = $user->id;
                $locker->saveOrFail();

                // Fecha de expiración promocion
                // $datetime = Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-31 23:59:59')->toDateTimeString();

                // type = 2 promoción temporal 1 mes gratis Premier Club
                $membership = new Membership();
                $membership->type = 2;
                $membership->status = 1;
                $membership->finish_at = Carbon::now()->addMonth()->toDateTimeString();
                $membership->users_id = $user->id;
                $membership->saveOrFail();

                event(new Registered($user));
                Auth::login($user);

            }
        }
        catch(\Exception $e)
        {
        DB::rollback();
        }

        return Redirect::to('/profile');

    }

    public function profile() {
        $user = Auth::user();

        // $address = Address::where('users_id',$user->id)
        // ->where('type', 3)->first();
        // !is_null($address) ? $user->address = $address:$user->address = null;

        return view('user.profile')->with(['user'=>$user]);
    }

    public function profileUpdate(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|alpha|max:15',
                'last_name' => 'required|alpha|max:15',
                'phone' => 'nullable|numeric|',
                'cui' => 'nullable|numeric|',
                'nit' => 'nullable|numeric|',
            ]);

            if($validator->fails()) {
                Session::flash('error', $validator->messages()->all());
                return Redirect::to('/profile');
            }else{
                $request->request->add(['users_id'=>Auth::user()->id]);
                $user = User::findOrfail(Auth::user()->id);
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->phone = $request->phone;
                $user->cui = $request->cui;
                $user->nit = $request->nit;
                $user->saveOrFail();

                $request->request->add(['status' => 1]);

                $request->request->add(['type' => 3]);
                is_null($request->address) ? $request->merge(['address' => '']):false;

                $address = Address::where('users_id',$user->id)
                ->where('type', 3)->first();
                !is_null($address) ? $request->request->add(['idaddress' => $address->idaddress]):false;

                $address = globalNewAddress($request);
            }

        } catch (\Throwable $th) {
            return Redirect::to('/profile');
        }
        return Redirect::to('/profile');
    }

    public function locker(){
        $locker = Locker::where('users_id',Auth::user()->id)->first();
        $country = DB::table('country_table')->where('idcountry_table',$locker->type)->get()[0];
        $locker->number = explode("/", $country->iso_code)[1].$locker->number;
        return view('user.locker')->with(['locker'=>$locker,'country'=>$country]);
    }

    public function lockerNumber(){
        do {
            $random = random_int(100000000000000, 999999999999999);
        } while (Locker::where('number','=',$random)->exists());

        return $random;
    }

    public function membership(){
        $membership = Membership::where('users_id',Auth::user()->id)->first();
        $membership ?
        $membership_table = DB::table('membership_table')->where('idmembership_table',$membership->type)->first():
        $membership_table = null;

        return view('user.membership')->with(['membership'=>$membership,'membership_table'=>$membership_table]);
    }
    // END ACCOUNT FUNCTIONS


    // USER ORDER FUNCTIONS
    public function orders(){
        $orders = Order::where('users_id',Auth::user()->id)
        ->leftJoin('quotation','quotation.order_idorder','=','order.idorder')
        ->whereBetween('order.status', ['2','4'])
        ->orderBy('order.updated_at', 'desc')
        ->select(
            'order.idorder',
            'order.order_number',
            'order.type AS order_type',
            'order.created_at',
            'quotation.idquotation',
            'quotation.order_idorder',
        )->get();


        $payment = null;
        foreach ($orders as $key => $order) {
            $payment = $this->getPayment($order);

            $order->total = $payment['total'];
            $order->currency = $payment['payment']->currency;
        }

        return view('user.orders')->with(['orders'=>$orders,'payment'=>$payment]);
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

        return view('user.order')->with($data->getData());
    }

    public function getOrderData($idorder)
    {
        $user = Auth::user();

        $order = Order::query()
        ->where('order.idorder',$idorder)
        ->where('order.users_id',$user->id)
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
        $user = Auth::user();

        $order = Order::query()
        ->where('order.idorder',$idorder)
        ->where('order.users_id',$user->id)
        ->leftJoin('quotation','quotation.order_idorder','=','order.idorder')
        ->select(
            'order.idorder',
            'order.order_number',
            'order.type AS order_type',
            'order.created_at AS order_created_at',
            'quotation.order_idorder',
            )
        ->first();

        // Fix this to lock enter address and not get the last one
        $address = Address::query()
        ->where('users_id',Auth::user()->id)
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
    // END USER ORDER FUNCTIONS
}
