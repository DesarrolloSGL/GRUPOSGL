<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    protected $table = 'quotation_detail';

    protected $primaryKey = 'idquotation_detail';

    protected $fillable = [
        'dollar_exchange',
        'transport',
        'clearance',
        'insurance',
        'dai',
        'dai_percentage',
        'dai_description',
        'iva',
        'shipping',
        'local_delivery',
        'total',
        'status',
        'order_idorder',
        'quotation_manual_idquotation_manual',
    ];
}
