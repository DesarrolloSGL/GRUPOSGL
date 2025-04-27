<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingStates extends Model
{
    protected $table = 'tracking_states';

    protected $primaryKey = 'idtracking_states';

    protected $fillable = [
        'tracking_number',
        'service',
        'status_1',
        'status_2',
        'status_3',
        'status_4',
        'status_5',
        'status_6',
        'status_7',
        'status_8',
        'status_9',
        'status_10',
        'status_11',
        'status_12',
        'status_13',
        'status_14',
        'status_15',
        'status_16',
        'status_17',
        'status_18',
        'status_19',
        'status_20',
    ];
}
