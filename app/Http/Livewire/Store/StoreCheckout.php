<?php

namespace App\Http\Livewire\Store;

use DB;
use Session;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


// Models
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Address;
use App\Models\CityTable;
use App\Models\DistrictTable;


class StoreCheckout extends Component
{
    public function render()
    {
        $cart = Cart::query()
        ->leftJoin('product','product.idproduct','=','cart.product_idproduct')
        ->where('cart.users_id',Auth::user()->id)
        ->where('cart.status',1)
        ->get();

        $this->checkAddress();

        $total = $this->getDbTotal();
        $order = $this->setUpdateOrder();
        $payment = $this->setUpdatePayment($order,$total);

        return view('livewire.store.store-checkout')->with([
            'cart'=>$cart,
            'order'=>$order,
            'payment'=>$payment,
        ]);
    }

    public $deliver_select,$deliver_address,$deliver_agency;
    public $receiver_name,$receiver_lastname,$receiver_phone;
    public $departamento,$municipio;
    public $address,$address_reference;

    public $client_address;
    public $address_open;

    public $modal = false;

    public function checkAddress()
    {
        $address = Address::query()
        ->where('users_id',Auth::user()->id)
        ->where('type', '5')
        ->where('status',1)
        ->latest()
        ->first();

        if($address->departamento && $address->municipio)
        {
            $departamento = DistrictTable::where('iddistrict_table',$address->departamento)->first();
            $address->departamento = $departamento->departamento;

            $municipio = CityTable::where('idcity_table',$address->municipio)->first();
            $address->municipio = $municipio->name;

        }

        $address = $address->toArray();
        $this->client_address = $address;
    }

    public function saveAddress(Request $request)
    {
        $validator = $this->validate([
            'deliver_select' => 'required',
            'address' => Rule::requiredIf($this->deliver_select == 1),
            'departamento' => Rule::requiredIf($this->deliver_select == 1),
            'municipio' => Rule::requiredIf($this->deliver_select == 1),
            'receiver_name' => 'required',
            'receiver_lastname' => 'required',
            'receiver_phone' => 'required|numeric|digits_between:8,10',
            'address_reference' => 'sometimes',
        ]);

        $address = new Address();
        $address->type = 5;
        $this->deliver_select == 1 ? $address->address = $this->address:false;
        $this->deliver_select == 2 ? $address->address = 'Agencia Zona 13':false;
        $this->deliver_select == 3 ? $address->address = 'Agencia Chiquimula':false;
        $this->deliver_select == 1 ? $address->departamento = $this->departamento:false;
        $this->deliver_select == 1 ? $address->municipio = $this->municipio:false;
        $address->name = $this->receiver_name.' '.$this->receiver_lastname;
        $address->phone = $this->receiver_phone;
        $address->comments = $this->address_reference;
        $address->status = 1;
        $address->users_id = Auth::user()->id;
        $address->saveOrFail();

        $this->resetAddressForm();
        $this->dispatchBrowserEvent('modalAddressClose');
        $this->emit('modalAddressClose');

        session()->flash('message', 'Dirección Actualizada.');
    }

    public function resetAddressForm()
    {
        $this->reset(['deliver_select','receiver_name','receiver_lastname','receiver_phone','departamento','municipio','address','address_reference']);
    }

    public function finishOrder($order_number)
    {
        $cart = Cart::where('users_id',Auth::user()->id)->where('status',1)->update(array('status' => 0));
        Session::forget('cart');
        Session::save();

        $order = Order::where('order_number',$order_number)->first();
        $order->status = 2;
        $order->saveOrFail();

        return Redirect::to('/user-order/'.$order->idorder);
    }

    // Done
    public function setUpdatePayment($order,$total){
        $payment = Payment::where('order_idorder',$order->idorder);

        if($payment->exists()){
            $payment = $payment->first();
            $payment->total = $total;
            $payment->saveOrFail();
        }else{
            $payment = new Payment();
            $payment->currency = 'Q';
            $payment->currency_text = 'GTQ';
            $payment->total = $total;
            $payment->order_idorder = $order->idorder;
            $payment->saveOrFail();
        }
        return $payment;
    }

    // Done
    public function setUpdateOrder()
    {
        $cart = Cart::where('users_id',Auth::user()->id)->where('status',1)->where('order_idorder','!=',null);


        if($cart->exists())
        {
            $order = Order::findOrFail($cart->first()->order_idorder);

            $cart = Cart::where('users_id',Auth::user()->id)->where('status',1)->update(array('order_idorder' => $order->idorder));
        }
        else
        {
            $order = new Order();
            $order->order_number = 'SGLSTORE'.globalRandomOrderNumber();
            $order->type = 5;
            $order->status = 0;
            $order->users_id = Auth::user()->id;
            $order->adviser_id= 0;
            $order->saveOrFail();

            $cart = Cart::where('users_id',Auth::user()->id)->where('status',1)->update(array('order_idorder' => $order->idorder));
        }

        return $order;
    }

    // Done
    public function getDbTotal()
    {
        $cart_db = Cart::where('users_id',Auth::user()->id)->where('status',1)->get();

        $total = 0;
        foreach ($cart_db as $key => $item) {
            $product = Product::findOrFail($item->product_idproduct);
            $product->compare_price > 0 ? ($price = $product->compare_price):($price = $product->price);

            $total += $price * $item->units;
        }

        return $total;
    }

    // Done
    public function addUnits($id_product)
    {
        $cart_db = Cart::where('product_idproduct',$id_product)->where('users_id',Auth::user()->id)->where('status',1)->first();
        $cart_db->units += 1;
        $cart_db->saveOrFail();
    }

    // Done
    public function decreaseUnits($id_product)
    {
        $cart_db = Cart::where('product_idproduct',$id_product)->where('users_id',Auth::user()->id)->where('status',1)->first();
        $cart_db->units -= 1;
        $cart_db->saveOrFail();
    }

    // Done
    public function removeCart($id_product)
    {
        if(Auth::check())
        {
            $cart_db = Cart::where('product_idproduct',$id_product)->where('users_id',Auth::user()->id)->where('status',1)->first();
            $cart_db->status = 0;
            $cart_db->saveOrFail();
        }
    }
}
