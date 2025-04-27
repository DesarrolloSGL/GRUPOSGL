<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneTable extends Model
{
    protected $table = 'zone_table';

    protected $primaryKey = 'idzone_table';

    protected $fillable = [
        'name',
        'red',
        'restricted',
        'city_table_idcity_table',
    ];
}
