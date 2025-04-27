<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $primaryKey = 'idproduct';

    protected $fillable = [
        'name',
        'sku',
        'description',
        'variant',
        'units_cart',
        'price',
        'link',
        'compare_price',
        'img',
        'img_extension',
        'visible',
        'status',
        'category_idcategory',
        'promo_idpromo',
    ];
}
