<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'idcategory';

    protected $fillable = [
        'name',
        'nearest_parent',
        'highest_parent',
    ];
}
