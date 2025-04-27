<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    protected $primaryKey = 'idaddress';

    protected $fillable = [
        'type',
        'address',
        'departamento',
        'municipio',
        'name',
        'phone',
        'email',
        'cui',
        'date',
        'time',
        'comments',
        'status',
        'users_id',
        'quotation_idquotation'
    ];
}
