<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $primaryKey = 'idorder';

    protected $fillable = [
        'order_number',
        'status',
        'type',
        'users_id',
        'adviser_id',
    ];
}
