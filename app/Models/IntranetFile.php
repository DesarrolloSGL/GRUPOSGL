<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntranetFile extends Model
{
    protected $table = 'intranet_files';

    protected $primaryKey = 'idintranet_files';

    protected $fillable = [
        'name',
        'file',
        'file_type',
        'organization_table_idorganization_table',
    ];
}
