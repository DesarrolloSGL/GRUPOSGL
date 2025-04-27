<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierExtraCostItem extends Model
{
    protected $table = 'courier_extra_cost_item';

    protected $primaryKey = 'idcourier_extra_cost_item';

    protected $fillable = [
        'courier_extra_cost_idcourier_extra_cost_item',
        'osc_idosc',
    ];
}
