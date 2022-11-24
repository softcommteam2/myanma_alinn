<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {
        return view('report.index');
    }

    public function dailyReport(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)
                            ->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)
                            ->toDateTimeString();
        $sales = Sales::whereBetween('record_date',[$start_date,$end_date])->get();
        return view('report',compact('sales'));
    }
}
