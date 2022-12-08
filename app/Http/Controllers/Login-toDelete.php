<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    public function index()
    {
        dd('dfdf');
        return view('layout.login');
    }
}
