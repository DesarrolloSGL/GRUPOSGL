<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $primaryKey = 'idinvoice';

    protected $fillable = [
        'order_number',
        'value',
        'tracking',
        'keyword',
        'new',
        'insurance',
        'divided',
        'file',
        'package_idpackage',
        'order_idorder',
    ];
}
