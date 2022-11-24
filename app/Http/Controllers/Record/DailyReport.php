<?php


namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales;
use Carbon\Carbon;

class DailyReport extends Controller
{
    public function index()
    {
        $sales=Sales::whereDate('record_date', Carbon::today())
                        ->get();

        $salescancel=Sales::whereDate('record_date', Carbon::today())
                        ->where('cancel', '=', NULL)
                        ->get();
        $salesAmount = $salescancel->pluck('total_amount')->toArray();
        $salesDiscount = $salescancel->pluck('discount_amount')->toArray();

        $AmountSum = array_sum($salesAmount);
        $DiscountSum = array_sum($salesDiscount);

        return view('record/dailyreport', compact('sales', 'AmountSum', 'DiscountSum'));
    }
}
