<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FilterItemContoller extends Controller
{
    public function index()
    {
        return view('record.item');
    }
}
