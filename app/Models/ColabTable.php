<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColabTable extends Model
{
    protected $table = 'colab_table';

    protected $primaryKey = 'idcolab_table';

    protected $fillable = [
        'name',
        'last_studies',
        'email',
        'extension',
        'phone',
        'since',
        'users_id',
    ];
}
