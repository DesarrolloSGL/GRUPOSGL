<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PromoController extends Controller
{

    public function index(){
        return view('promo.index');
    }

    public function add(Request $request) {
        try
        {
            (new Promo($request->input()))->saveOrFail();
        }
        catch(\Exception $e)
        {
          DB::rollback();
        }
        return Redirect::to('/admin-index');
    }

    public function check(Request $request){
        $promo = Promo::where('code',$request->code)->get();

        if(count($promo) > 0 ){
            if($promo[0]->status = 1){
                $discount = $promo[0]->discount;
                $msg = "Codigo Aplicado";
            }else{
                $msg = "Codigo No Valido";
                $discount = 0;
            }
        }else{
            $msg = "Codigo No Valido";
            $discount = 0;
        }

        $response = array(
            'msg' => $msg,
            'discount' => $discount,
            'total' => $request->total,
        );

        return \Response::json($response);
    }
}

