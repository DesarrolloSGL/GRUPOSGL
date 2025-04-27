<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductSlider extends Component
{
    public $category;

    public function render()
    {

        $products = Product::inRandomOrder()
        ->where('category_idcategory',$this->category)
        ->where('visible',1)
        ->where('price','>',1)
        ->limit(6)
        ->get();

        $category_name = Category::where('idcategory',$this->category)->first();

        return view('livewire.store.product-slider')->with([
            'products'=>$products,
            'category_name'=>$category_name
        ]);
    }
}
