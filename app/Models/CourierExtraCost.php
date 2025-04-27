<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierExtraCost extends Model
{
    protected $table = 'courier_extra_cost';

    protected $primaryKey = 'idcourier_extra_cost';

    protected $fillable = [
        'name',
        'description',
        'total',
        'type',
        'status',
        'order_idorder',
        'product_idproduct',
    ];
}
