<?php

namespace App\Http\Controllers\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Sales;
use App\Models\Customer;
use App\Models\ItemCategory;
use App\Models\ItemSKU;
use App\Models\Account;
use Laravel\Ui\Presets\React;

class ByCusotmerOrByAccount extends Controller
{
    public function index()
    {
        $sales= Sales::paginate(25);
        $itemsku=ItemSKU::all();
        $customers=Customer::all();
        $accounts=Account::all();
        return view('record.customer_or_account' , compact('sales', 'itemsku', 'customers', 'accounts'));
    }

    public function search(Request $request)
    {
        $search= $request->search;

        $sales= Sales::where('sale_date', 'like', '%'.$request->search.'%')
        ->orWhereHas('customer', function($customer) use($request){
            $customer->where('name', 'like', '%'.$request->search.'%');
        })
        ->orWhereHas('account', function($account) use($request){
            $account->where('name', 'like', '%'.$request->search.'%');
        })
        ->get();

    return view('record.customer_or_account' , compact('sales', 'search'));
    }
}
