<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales;

class RecordLedgerController extends Controller
{
    public function index()
    {
        $sales= Sales::all();
        return view('record.ledger', compact('sales'));
    }

    public function getData(Request $request)
    {
        $start_date= $request->start_date;
        $end_date= $request->end_date;
        $sales= Sales::whereBetween('record_date',[$start_date,$end_date])->get();

        return view('record.ledger', compact('sales'));
    }
}
