<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SaleDateAdjustController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {

        $sales = Sales::orderBy('id', 'DESC')->paginate(25);


        return view('sales.sale_date_adjust', compact('sales'));
    }

    public function edit($id)
    {


        $sales = Sales::findOrFail($id);
        return view('sales.editrecorddate', compact('sales'));
    }

    public function update(Request $request, $id)
    {
        $sd = $request->record_date;
        $cd_status = $request->change_date_status;
        $sale = Sales::findOrFail($id);
        $sale->update(['record_date' => $sd]);
        $sale->update(['change_date_status' => $cd_status]);
        return redirect('dateadjust');
    }
}
