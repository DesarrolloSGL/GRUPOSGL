<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplierForm()
    {
        return view('supplier.index');
    }
}
