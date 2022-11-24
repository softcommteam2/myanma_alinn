<?php

namespace App\Http\Controllers;


use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TimeFrame extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {
        $sales= Sales::latest()->take(50)->get();
        return view('timeframe.index', compact('sales'));
    }

    public function getData(Request $request)
    {

        $start_date= $request->start_date;
        $end_date= $request->end_date;

        $sales= Sales::where('record_date','>=',[$start_date])
                        ->where('record_date','<=',[$end_date])
                        ->get();

        return view('timeframe.index', compact('sales', 'start_date', 'end_date'));
    }


    public function today()
    {
        $sales = Sales::whereDate('record_date', Carbon::today())->get();
        $today=Carbon::today();

        return view('timeframe.today', compact('sales', 'today'));
    }


    public function last3days()
    {
        $today=Carbon::today();
        $date = Carbon::yesterday()->subDays(3);
        $sales = Sales::where('record_date', '<',$today)->where('record_date', '>',$date)->latest()->get();

        return view('timeframe.last3days', compact('sales', 'today', 'date'));
    }

    public function last7days()
    {
        $today=Carbon::today();
        $date = Carbon::yesterday()->subDays(7);

        $sales = Sales::where('record_date', '<',$today)->where('record_date', '>',$date)->latest()->get();

        return view('timeframe.last7days', compact('sales', 'today', 'date'));
    }

    public function last10days()
    {
        $today=Carbon::today();
        $date = Carbon::yesterday()->subDays(10);

        $sales = Sales::where('record_date', '<',$today)->where('record_date', '>',$date)->latest()->get();

        return view('timeframe.last10days', compact('sales', 'today', 'date'));
    }

    public function last14days()
    {
        $today=Carbon::today();
        $date = Carbon::yesterday()->subDays(14);

        $sales = Sales::where('record_date', '<',$today)->where('record_date', '>',$date)->latest()->get();

        return view('timeframe.last14days', compact('sales', 'today', 'date'));
    }

    public function thisweek()
    {
        $start_of_date = Carbon::now()->startOfWeek();
        $end_of_week = Carbon::now()->endOfWeek();

        $sales = Sales::where('record_date', '>=', $start_of_date)->where('record_date', '<=', $end_of_week)->latest()->get();

        return view('timeframe.thisweek', compact('sales' , 'start_of_date', 'end_of_week'));
    }

    public function previousweek()
    {
        $prestartweek=Carbon::now()->weekday(-1)->startOfWeek();
        $preendweek=Carbon::now()->weekday(-1)->endOfWeek();


        $sales = Sales::where('record_date', '>=', $prestartweek)->where('record_date', '<=', $preendweek)->latest()->get();

        return view('timeframe.previousweek', compact('sales', 'prestartweek', 'preendweek'));
    }

    public function thismonth()
    {
        $thismonthstart=Carbon::now()->startOfMonth();
        $thismonthend=Carbon::now()->endOfMonth();
        $sales = Sales::where('record_date', '>=', $thismonthstart)->where('record_date', '<=', $thismonthend)->latest()->get();

        return view('timeframe.thismonth', compact('sales', 'thismonthstart', 'thismonthend'));
    }

    public function previousmonth(Request $request)
    {
        $prevmonth=Carbon::now()->subMonth()->format('Y-m');
        $sales = Sales::where('record_date', 'like', $prevmonth.'%')->latest()->get();

        return view('timeframe.previousmonth', compact('sales', 'prevmonth'));
    }

    public function bymonth(Request $request)
    {
        $month=Carbon::now()->format('Y-m');
        $sales = Sales::where('record_date', 'like', $month.'%')->latest()->get();

        return view('timeframe.by-month', compact('sales', 'month'));
    }

    public function bymonth_search(Request $request)
    {
        $selectedmonth=$request->search;
        $sales = Sales::where('record_date', 'like', $selectedmonth.'%')->latest()->get();

        return view('timeframe.by-month', compact('sales', 'selectedmonth'));
    }

    public function thisyear()
    {
        $date = Carbon::now()->year;
        $sales = Sales::where('record_date', 'like', $date.'%')->latest()->get();

        return view('timeframe.thisyear', compact('sales', 'date'));
    }

    public function print()
    {
        $sales=Sales::findOrFail($id);
        return view('timeframe.show', compact('sales'));
    }
}

