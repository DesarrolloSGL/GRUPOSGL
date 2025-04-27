<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTable extends Model
{
    protected $table = 'city_table';

    protected $primaryKey = 'idcity_table';

    protected $fillable = [
        'name',
        'district_table_iddistrict_table',
    ];
}
