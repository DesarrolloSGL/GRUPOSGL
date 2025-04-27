<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationTable extends Model
{
    protected $table = 'organization_table';

    protected $primaryKey = 'idorganization_table';

    protected $fillable = [
        'position',
        'level',
        'coordinate',
        'color_1',
        'color_2',
        'colab_table_idcolab_table',
    ];
}
