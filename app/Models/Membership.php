<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';

    protected $primaryKey = 'idmembership';

    protected $fillable = [
        'type',
        'status',
        'finish_at',
        'users_id',
    ];
}
