<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index(){
        return view('product.index');
    }

    public function add(Request $request) {
        try
        {
            $file = $request->file('images');

            foreach ($file as $key=>$valor){
                $statement = DB::select("SHOW TABLE STATUS LIKE 'product'");
                $nextId = $statement[0]->Auto_increment;
                $extension = explode('.',$valor->getClientOriginalName())[1];
                $destino = public_path().'/images/'.$nextId;
                $nombre = $key.'.'.$extension;
                $valor->move($destino, $nombre);
            }
            // $categories = explode('›',$request->category);

            $product = new Product($request->input());
            $product->img = ($key+1);
            $product->saveOrFail();

            $this->token($nextId);
        }
        catch(\Exception $e)
        {
          DB::rollback();
        }
        return Redirect::to('/store-index');
    }

    public function token($id)
    {
        $token = bin2hex(random_bytes(16));
        $repeated = Product::where('link', $token)->get();
        if($repeated->count() == 0){
            $product = Product::findOrFail($id);
            $product->link = $token;
            $product->saveOrFail();
        }else{
            $this->token($id);
        }
    }
}
