<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictTable extends Model
{
    protected $table = 'district_table';

    protected $primaryKey = 'iddistrict_table';

    protected $fillable = [
        'type',
        'name',
        'departamento',
        'municipio',
        'address'
    ];
}
