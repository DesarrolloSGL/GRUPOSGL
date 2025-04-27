<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $table = 'exchange';

    protected $primaryKey = 'idexchange';

    protected $fillable = [
        'currency',
        'value',
    ];
}
