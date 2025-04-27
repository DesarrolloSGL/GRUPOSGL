<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    protected $table = 'locker';

    protected $primaryKey = 'idlocker';

    protected $fillable = [
        'type',
        'number',
        'status',
        'users_id',
    ];
}
