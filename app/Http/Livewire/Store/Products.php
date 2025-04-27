<?php

namespace App\Http\Livewire\Store;

use App\Models\User;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name,$description,$variant,$category,$price,$compare_price,$link,$idproduct;
    public $visible = true;
    public $files = [];

    public $selected_category;
    public $category_name, $category_parent;
    public $search;

    public function render()
    {
        $search = $this->search;

        $categories = Category::query()->get();
        $products = Product::query()
        ->leftJoin('category','category.idcategory','=','product.category_idcategory')
        ->select(
            'product.idproduct',
            'product.img_extension',
            'product.name',
            'product.description',
            'product.price',
            'product.compare_price',
            'product.link',
            'product.visible',
            'category.name AS category_name',
        )
        ->orderBy('product.created_at', 'desc')
        ->where(function ($query) use($search) {
            $query->where('product.name', 'like', '%'. $search .'%')
               ->orWhere('product.description', 'like', '%'. $search .'%')
               ->orWhere('product.price', 'like', '%'. $search .'%')
               ->orWhere('product.compare_price', 'like', '%'. $search .'%')
               ->orWhere('product.link', 'like', '%'. $search .'%');
        });

        $this->selected_category ? $products = $products->where('product.category_idcategory',$this->selected_category):false;

        $products = $products->paginate(30);

        $rates = globalGetRates();

        return view('livewire.store.products')->with(['categories'=>$categories,'products'=>$products,'rates'=>$rates]);
    }

    public function createProduct()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'variant' => 'sometimes',
            'category' => 'required',
            'price' => 'required|numeric',
            'compare_price' => 'sometimes',
            'link' => 'sometimes',
            'files' => 'sometimes',
        ]);
        $files = $this->files;
        $files ? $extension = '.'.$files[0]->extension():$extension = '';

        $this->compare_price == "" ? $this->compare_price = null:false;

        $product = Product::updateOrCreate(['idproduct'=>$this->idproduct],
        [
            'name' => $this->name,
            'description' => $this->description,
            'variant' => $this->variant,
            'category_idcategory' => $this->category,
            'price' => $this->price,
            'compare_price' => $this->compare_price,
            'link' => $this->link,
            'sku' => Product::max('sku') + 1,
            'visible' => $this->visible,
        ]);

        if($files){
            $product->img = count($files);
            $product->img_extension = $extension;
            $product->saveOrfail();

            foreach ($files as $key => $image) {
                $extension = $image->extension();
                $image->storeAs('public/store/'.$product->idproduct,$key.'.'.$extension);
            }
        }

        $this->cleanFormCreateProduct();
    }

    public function cleanFormCreateProduct()
    {
        $this->name = null;
        $this->description = null;
        $this->variant = null;
        $this->category = null;
        $this->price = null;
        $this->compare_price = null;
        $this->link = null;
        $this->visible = true;
        $this->files = [];

        $this->idproduct = null;
    }

    public function createCategory()
    {
        $this->validate([
            'category_name' => 'required',
        ]);

        $category = new Category();
        $category->name = $this->category_name;
        $category->nearest_parent = $this->category_parent;
        // $this->category_parent? $category->highest_parent = : $category->highest_parent = ;

        $category->saveOrFail();

        $this->cleanFormCreateCategory();
    }

    public function cleanFormCreateCategory()
    {
        $this->category_name = null;
        $this->category_parent = null;
    }

    public function updateProduct($idproduct)
    {
        $product = Product::findOrFail($idproduct);
        $this->idproduct = $idproduct;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->variant = $product->variant;
        $this->category = $product->category_idcategory;
        $this->price = $product->price;
        $this->compare_price = $product->compare_price;
        $this->link = $product->link;
        $this->visible = $product->visible;
    }

    public function clearFilesServer()
    {
        $this->files = [];
    }

}

