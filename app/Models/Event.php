<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $primaryKey = 'idevent';

    protected $fillable = [
        'number',
        'receipt',
        'name',
        'lastname',
        'business',
        'dpi',
        'job',
        'phone',
        'email',
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_4_extra',
        'description',
        'status',
        'authorization',
    ];
}
