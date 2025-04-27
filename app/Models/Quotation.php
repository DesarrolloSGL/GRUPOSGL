<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = 'quotation';

    protected $primaryKey = 'idquotation';

    protected $fillable = [
        'sender',
        'destination',
        'email',
        'service',
        'premier',
        'prepaid',
        'terms',
        'order_idorder'
    ];
}
