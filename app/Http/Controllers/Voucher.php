<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class Voucher extends Controller
{
    public function index()
    {
        return view('voucher.print');
    }

}
