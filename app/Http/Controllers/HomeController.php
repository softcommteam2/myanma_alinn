<?php

namespace App\Http\Controllers;

use App\Models\Sales;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales= Sales::all();
        return view('home', compact('sales'));

    }
}
