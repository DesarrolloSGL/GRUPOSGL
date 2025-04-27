<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;

use App\Models\Product;

class ProductBox extends Component
{
    public $title,$button;

    public function render()
    {
        $products = Product::inRandomOrder()
        ->where('visible',1)
        ->where('price','>',1)
        ->limit(8)
        ->get();

        return view('livewire.store.product-box')->with(['products'=>$products]);
    }
}
