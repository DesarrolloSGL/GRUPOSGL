<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OSC extends Model
{
    protected $table = 'osc';

    protected $primaryKey = 'idosc';

    protected $fillable = [
        'dollar_exchange',
        'transport',
        'clearance',
        'insurance',
        'dai',
        'iva',
        'duca',
        'sed',
        'shipping',
        'local_delivery',
        'total',
        'status',
        'order_idorder',
    ];
}
