<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function scheduleValidMembership(){
        $date1 = $carbon::now()->addMonth()->toDateTimeString();
        $date2 = $carbon::now()->toDateTimeString();
        $dif = $carbon::parse($date1)->gt($carbon::parse($date2));
    }
}
