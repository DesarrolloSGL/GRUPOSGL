<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $primaryKey = 'idpayment';

    protected $fillable = [
        'type',
        'total',
        'currency',
        'currency_text',
        'exchange',
        'bank_note',
        'status',
        'comments',
        'quotation_idquotation',
        'order_idorder',
        'user',
    ];
}
