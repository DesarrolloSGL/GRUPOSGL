<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationManual extends Model
{
    protected $table = 'quotation_manual';

    protected $primaryKey = 'idquotation_manual';

    protected $fillable = [
        'quotation_number',
        'name',
        'lastname',
        'email',
        'service',
        'terms',
        'order_idorder',
    ];
}
