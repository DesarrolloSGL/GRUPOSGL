<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacora_log';

    protected $primaryKey = 'idbitacora_log';

    protected $fillable = [
        'iduser',
        'action',
        'table',
        'idtable',
    ];
}
