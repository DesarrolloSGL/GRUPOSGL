<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipTable extends Model
{
    protected $table = 'membership_table';

    protected $primaryKey = 'idmembership_table';

    protected $fillable = [
        'level',
        'name',
        'clearance',
        'cost_per_pound_miami',
        'cost_per_pound_china',
        'shipping',
        'points',
    ];
}
