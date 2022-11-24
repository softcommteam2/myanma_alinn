<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Record extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {
        return view('record.index');
    }
}
