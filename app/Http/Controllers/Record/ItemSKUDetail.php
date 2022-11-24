<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\ItemSKU;
use App\Models\Sales;


class ItemSKUDetail extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {
        $sales= Sales::where('cancel','=', NULL)->paginate(25);
        $itemsku=ItemSKU::all();
        $accounts=Account::all();
        $status="paginate";
        return view('record.itemskudetail' , compact('sales', 'itemsku', 'status', 'accounts'));
    }

    public function filterskudetail(Request $request)
    {
        $itemsku_id= $request->itemsku;
        $account_id= $request->account;
        $start_date= $request->start_date;
        $end_date= $request->end_date;

        $itemsku_name=ItemSKU::find($itemsku_id);

        $paid=Account::find($account_id);
        // dd($start_date,$end_date);


        if(($request->itemsku && $request->account && $request->start_date && $request->end_date)){
            $sales = Sales::where('itemsku_id','=', $itemsku_id)
            ->where('cancel','=', NULL)
            ->where('paid_id','=', $account_id)
            ->where('record_date','>=',$start_date)
            ->where('record_date','<=',$end_date)
            ->latest()
            ->get();

        } elseif ($request->itemsku && $request->start_date && $request->end_date){
            $sales = Sales::where('itemsku_id','=', $itemsku_id)
            ->where('cancel','=', NULL)
            ->where('record_date','>=',$start_date)
            ->where('record_date','<=',$end_date)
            ->latest()
            ->get();
            // dd($sales);

        } elseif ($request->itemsku && $request->account){
            $sales = Sales::where('itemsku_id','=', $itemsku_id)
            ->where('cancel','=', NULL)
            ->where('paid_id','=', $account_id)
            ->latest()
            ->get();
            // dd($sales);

        } elseif ($request->itemsku){
            $sales = Sales::where('itemsku_id','=', $itemsku_id)
            ->where('cancel','=', NULL)
            ->latest()
            ->get();

        } else {
            return back();
        }

        $status = "no paginate";

        // dd($sales, $account_id

        $itemsku= ItemSKU::all();
        $accounts=Account::all();

        return view('record.itemskudetail', compact('sales','accounts', 'itemsku', 'status', 'itemsku_name', 'start_date', 'end_date', 'paid', 'account_id'));
    }
}
