<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateUs extends Model
{
    protected $table = 'rate_us';

    protected $primaryKey = 'idrate_us';

    protected $fillable = [
        'rating',
        'commentary',
        'users_id'
    ];
}
