<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'tracking';

    protected $primaryKey = 'idtracking';

    protected $fillable = [
        'service',
        'tracking_number',
        'hbl',
        'mbl',
        'awb',
        'order_number',
        'order_idorder',
        'users_id',
        'status'
    ];
}
