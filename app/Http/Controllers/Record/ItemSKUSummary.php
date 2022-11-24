<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales;
use App\Models\ItemSKU;
use App\Models\Item;


class ItemSKUSummary extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }
    public function index()
    {
        $totamt=Sales::pluck('total_amount');

        $sep_comma=",";
        $arr = explode($sep_comma, $totamt);
        $inttotamt=(int)$arr;
        $sales= Sales::where('status', '=', 1)
                        ->groupBy('itemsku_id')
                        ->selectRaw('sum(total_amount) as sumamount, itemsku_id')
                        ->selectRaw('sum(total_inches) as sumtotinch, itemsku_id')
                        ->selectRaw('sum(discount_amount) as sumdiscount, itemsku_id')
                        ->selectRaw('price')
                        ->selectRaw('item_id')
                        ->get();
        $salesAmount = $sales->pluck('sumamount')->toArray();
        $salesDiscount = $sales->pluck('sumdiscount')->toArray();

        $totalAmountSum = array_sum($salesAmount);
        $totalDiscountSum = array_sum($salesDiscount);

        $start_date = request()->start_date;
        $end_date = request()->end_date;

        $itemsku= ItemSKU::all();
        $item= Item::all();
        return view('record.itemskusummary', compact('sales','item', 'itemsku', 'totalAmountSum', 'totalDiscountSum', 'start_date', 'end_date'));
    }

    public function filterskusummary(Request $request)
    {
        $itemsku_id= $request->itemsku;
        $start_date= $request->start_date;
        $end_date= $request->end_date;
        $totamt=Sales::pluck('total_amount');
        $stat1=1;
        $sales= Sales::where('record_date','>=',[$start_date])
                        ->where('record_date','<=',[$end_date])
                        ->where('status','=', 1)
                        ->where('cancel','=', NULL)
                        ->groupBy('itemsku_id')
                        ->selectRaw('sum(total_amount) as sumamount, itemsku_id')
                        ->selectRaw('sum(discount_amount) as sumdiscount, itemsku_id')
                        ->selectRaw('sum(total_inches) as sumtotinch, itemsku_id')
                        ->selectRaw('sum(price) as sumprice, itemsku_id')
                        ->selectRaw('item_id')
                        ->get();
                        $salesAmount = $sales->pluck('sumamount')->toArray();
                        $salesDiscount = $sales->pluck('sumdiscount')->toArray();
                        // dd($sales);

                        $totalAmountSum = array_sum($salesAmount);
                        $totalDiscountSum = array_sum($salesDiscount);
                        $itemsku= ItemSKU::all();
        return view('record.itemskusummary', compact('sales', 'itemsku',  'totalAmountSum', 'totalDiscountSum', 'start_date', 'end_date'));
    }

    public function detailsummary(Request $request, $itemsku_id, $start_date, $end_date)
    {
        $itemsku_id = $itemsku_id;
        $start_date = $start_date;
        $end_date = $end_date;

        $itemskuname= ItemSKU::find( $itemsku_id);
        $sales=Sales::where('record_date','>=',$start_date)
        ->where('record_date','<=',$end_date)
        ->where('status','=', 1)
        ->where('itemsku_id','=',$itemsku_id)
        ->get();
        $pluck=Sales::where('record_date','>=',$start_date)
        ->where('record_date','<=',$end_date)
        ->where('cancel','=', NULL)
        ->where('status','=', 1)
        ->where('itemsku_id','=',$itemsku_id)
        ->selectRaw('sum(total_amount) as sumamount, itemsku_id')
        ->selectRaw('sum(discount_amount) as sumdiscount, itemsku_id')
        ->selectRaw('sum(total_inches) as sumtotinch, itemsku_id')
        ->get();
        // dd($pluck);
        $salesAmount = $pluck->pluck('sumamount')->toArray();
        $salesDiscount = $pluck->pluck('sumdiscount')->toArray();
        $salesInch = $pluck->pluck('sumtotinch')->toArray();

        $totalAmountSum = array_sum($salesAmount);
        $totalDiscountSum = array_sum($salesDiscount);
        $totalInchSum = array_sum($salesInch);

        return view('record.itemskusummarydetail', compact('sales', 'itemskuname', 'start_date', 'end_date', 'totalAmountSum', 'totalDiscountSum', 'totalInchSum'));
    }

}
