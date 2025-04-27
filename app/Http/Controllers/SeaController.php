<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeaRates;

class SeaController extends Controller
{
    public function index(){
        $sea_rates = SeaRates::query()->get();

        return view('sea.index')->with(['sea_rates'=>$sea_rates]);
    }
}
