<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'promo';

    protected $primaryKey = 'idpromo';

    protected $fillable = [
        'code',
        'discount',
        'description',
    ];
}
