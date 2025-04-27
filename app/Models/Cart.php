<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $primaryKey = 'idcart';

    protected $fillable = [
        'units',
        'comments',
        'score',
        'status',
        'order_idorder',
        'product_idproduct',
        'users_id',
    ];
}
