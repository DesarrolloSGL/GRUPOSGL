<?php

namespace App\Http\Controllers;

use Session;
use App\Models\OSC;
use App\Models\User;
use App\Models\Promo;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Address;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Tracking;
use App\Models\TrackingStatus;
use App\Models\Billing;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\Facades\DB;
use DB;

class TestController extends Controller
{


    public function clear()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // User::query()->truncate();
        Address::query()->truncate();
        Billing::query()->truncate();
        Order::query()->truncate();
        Product::query()->truncate();
        Cart::query()->truncate();
        Quotation::query()->truncate();
        OSC::query()->truncate();
        Package::query()->truncate();
        Payment::query()->truncate();
        Promo::query()->truncate();
        Tracking::query()->truncate();
        Invoice::query()->truncate();
        TrackingStatus::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return Redirect::to('/');
    }
}




