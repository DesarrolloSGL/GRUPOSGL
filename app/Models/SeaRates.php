<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeaRates extends Model
{
    protected $table = 'sea_rates';

    protected $primaryKey = 'idsea_rates';

    protected $fillable = [
        'continet',
        'from',
        'to',
        'carrier',
        'month',
        'week',
        'pol',
        'route',
        'pod',
        'tt',
        '20_std_buy',
        '40_std_buy',
        '40_hq_buy',
        '40_nor_buy',
        'margin',
        '20_std_sale',
        '40_std_sale',
        '40_hq_sale',
        '40_nor_sale',
        'demurage',
        'storage',
        'of_the',
        'to_the',
        'article',
        'description',
    ];
}
