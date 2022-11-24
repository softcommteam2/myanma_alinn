<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Sales;
use App\Models\Customer;
use App\Models\ItemCategory;


class RecordItemsController extends Controller
{
    public function index()
    {
        $items=Item::all();
        $sales=Sales::paginate(25);
        $customer=Customer::all();
        $category=ItemCategory::all();
        $status="paginate";
        return view('record.item', compact('items', 'sales', 'customer', 'category', 'status'));
    }



    public function filterItem(Request $request)
    {
        $item_id= $request->item_id;
        $start_date= $request->start_date;
        $end_date= $request->end_date;
        $item_name=Item::where('id', '=', $item_id)->pluck('name');
        $sales= Sales::where('record_date','>=',[$start_date])
                        ->where('record_date','<=',[$end_date])
                        ->orWhere('item_id','like',[$item_id])
                        ->orderBy('id', 'DESC')->get();
        $items= Item::all();
        $status="no paginate";

        return view('record.item', compact('sales', 'items','start_date', 'end_date', 'status', 'item_name'));
    }
}
