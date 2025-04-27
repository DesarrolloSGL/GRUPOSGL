<?php

namespace App\Http\Livewire\Store;

use Session;
use App\Models\Cart;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public $sku;

    public function render()
    {
        $this->getCartItems();
        $this->getCartCounter();
        $this->getSessionTotal();

        $product = Product::where('sku',$this->sku)->first();

        // Auth check
        // $product_selection = Cart::where('users_id',Auth::user()->id)
        // ->where('status',1)
        // ->where('product_idproduct',$product->idproduct)
        // ->get();

        return view('livewire.store.product-detail')->with([
            'product'=>$product,
            // 'product_selection'=>$product_selection,
        ]);
    }

    // Done
    public $cart_items = [];
    public function getCartItems(){
        if(Auth::check()){
            $this->cartFromSessionToDb();
            $this->cartFromDbToSession();
        }

        $this->cart_items = Session::get('cart');
        !($this->cart_items)? $this->cart_items = []:false;
    }

    // Done
    public function cartFromDbToSession(){
        Session::forget('cart');
        Session::save();

        $cart_db = Cart::where('users_id',Auth::user()->id)->where('status',1)->get();

        foreach ($cart_db as $key => $item) {
            $product = Product::findOrFail($item->product_idproduct)->attributesToArray();
            $product['compare_price'] > 0 ? ($price = $product['compare_price']):($price = $product['price']);
            $product['units_cart'] = $item->units;
            $product['total'] = $price*$item->units;
            $product['selected_variant'] = $item->variant;
            Session::push('cart', $product);
        }
    }

    // Done
    public function cartFromSessionToDb()
    {
        $cart_session = Session::get('cart');
        !$cart_session ? $cart_session = []:false;

        $cart_db = Cart::where('users_id',Auth::user()->id)->where('status',1);
        if(!$cart_db->exists())
        {
            foreach ($cart_session as $key => $item)
            {
                $cart = new Cart();
                $cart->product_idproduct = $item['idproduct'];
                $cart->units = $item['units_cart'];
                $cart->variant = $item['selected_variant'];
                $cart->users_id = Auth::user()->id;
                $cart->status = 1;
                $cart->saveOrFail();
            }
        }
    }

    // Done
    public function addCart($id_product){
        $product = Product::findOrFail($id_product)->attributesToArray();
        $product['compare_price'] > 0 ? ($price = $product['compare_price']):($price = $product['price']);

        if(Auth::check()){
            $cart_db = Cart::where('product_idproduct',$id_product)->where('users_id',Auth::user()->id)->where('status',1);
            if($cart_db->exists())
            {
                $cart = $cart_db->first();
                $cart->units += 1;
                $cart->saveOrFail();
            }else{
                $cart = new Cart();
                $cart->product_idproduct = $id_product;
                $cart->units = 1;
                $cart->variant = $this->variant;
                $cart->price = $price;
                $cart->users_id = Auth::user()->id;
                $cart->status = 1;
                $cart->saveOrFail();
            }
        }

        $cart_session = Session::get('cart');
        !$cart_session ? $cart_session = []:false;

        $filtered_cart_session = array_filter($cart_session, function ($item) use ($id_product) {return $item['idproduct'] == $id_product;});

        $key = key($filtered_cart_session);

        if($filtered_cart_session){
            $cart_session[$key]['units_cart'] += 1;
            $cart_session[$key]['total'] = $price*$cart_session[$key]['units_cart'];
            Session::put('cart', $cart_session);
        }else{
            $product['units_cart'] = 1;
            $product['selected_variant'] = $this->variant;
            $product['total'] = $price*$product['units_cart'];
            Session::push('cart', $product);
        }

        session()->flash('message','PRODUCTO AÑADIDO AL CARRITO');
        $this->emit('alert-remove');
    }

    // Done
    public function removeCart($id_product){
        if(Auth::check()){
            $cart_db = Cart::where('product_idproduct',$id_product)->where('users_id',Auth::user()->id)->where('status',1)->first();
            $cart_db->status = 0;
            $cart_db->saveOrFail();
        }

        $cart_session = Session::get('cart');
        $filtered_cart_session = array_filter($cart_session, function ($item) use ($id_product) {return $item['idproduct'] == $id_product;});
        $key = key($filtered_cart_session);

        unset($cart_session[$key]);

        Session::put('cart', $cart_session);
    }

    // Done
    public function addUnits($id_product){
        if(Auth::check()){
            $cart_db = Cart::where('product_idproduct',$id_product)->where('users_id',Auth::user()->id)->where('status',1)->first();
            $cart_db->units += 1;
            $cart_db->saveOrFail();
        }

        $cart_session = Session::get('cart');
        $filtered_cart_session = array_filter($cart_session, function ($item) use ($id_product) {return $item['idproduct'] == $id_product;});
        $key = key($filtered_cart_session);

        $cart_session[$key]['compare_price'] > 0 ? ($price = $cart_session[$key]['compare_price']):($price = $cart_session[$key]['price']);

        $cart_session[$key]['units_cart'] < 10 ? $cart_session[$key]['units_cart'] += 1:false;

        $cart_session[$key]['total'] = $price*$cart_session[$key]['units_cart'];

        Session::put('cart', $cart_session);
    }

    // Done
    public function decreaseUnits($id_product){
        if(Auth::check()){
            $cart_db = Cart::where('product_idproduct',$id_product)->where('users_id',Auth::user()->id)->where('status',1)->first();
            $cart_db->units -= 1;
            $cart_db->saveOrFail();
        }

        $cart_session = Session::get('cart');
        $filtered_cart_session = array_filter($cart_session, function ($item) use ($id_product) {return $item['idproduct'] == $id_product;});
        $key = key($filtered_cart_session);

        $cart_session[$key]['compare_price'] > 0 ? ($price = $cart_session[$key]['compare_price']): ($price = $cart_session[$key]['price']);

        $cart_session[$key]['units_cart'] > 0 ? $cart_session[$key]['units_cart'] -= 1:false;

        $cart_session[$key]['total'] = $price*$cart_session[$key]['units_cart'];

        Session::put('cart', $cart_session);
    }

    // Done
    public $total_session = 0;
    public function getSessionTotal(){
        $cart_session = Session::get('cart');
        !$cart_session ? $cart_session = []:false;

        $this->total_session = 0;
        foreach ($cart_session as $key => $item) {
            $item['compare_price'] > 0 ? $price = $item['compare_price']:$price = $item['price'];

            $this->total_session += $price * $item['units_cart'];
        }
    }

    // Done
    public $cart_items_counter = 0;
    public function getCartCounter(){
        Auth::check() ? $cart_db = Cart::where('users_id',Auth::user()->id)->where('status',1):false;
        $cart_session = Session::get('cart');

        $this->cart_items_counter = 0;
        if(Auth::check())
        {
            if($cart_db->exists())
            {
                foreach ($cart_db->get() as $key => $item)
                {
                    $this->cart_items_counter += $item['units'];
                }
            }
        }
        else
        {
            if($cart_session)
            {
                foreach ($cart_session as $key => $item)
                {
                    $this->cart_items_counter += $item['units_cart'];
                }
            }
        }
    }

    public $variant;
    public function selectVariant($variant)
    {
        $this->variant = $variant;
    }

}
