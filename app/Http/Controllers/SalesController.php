<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Customer;
use App\Models\Item;
use App\Models\ItemSku;
use App\Models\Sales;
use App\Models\years;
use Carbon\Carbon;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\LogTrait;


class SalesController extends Controller
{
    use LogTrait;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index(Request $request)
    {

        $nowDate = substr(now(), 0, 7);

        // dd($nowDate);

        $sales = Sales::where('created_at', 'like', $nowDate . '%')
            ->orderBy('id', 'desc')
            ->paginate(25);
        $currentURL = url()->current(); //current url
        $today = Carbon::now(); //current date

        return view('sales.index', compact('sales', 'currentURL'));
    }


    public function create()
    {
        $sales = new Sales();
        $items = Item::all();
        $customers = Customer::all();
        $accounts = Account::all();
        $years = years::all();

        return view('sales.create', compact('items', 'customers', 'sales', 'accounts', 'years'));
    }


    public function store(Request $request)
    {
        $final_year = DB::table('sales')->latest('id')->first();

        $input_budget_year = $request->budget_year;
        if ($final_year == null) {
            $final_budget_year = 2022;
        } else {
            $final_budget_year = $final_year->budget_year;
        }

        $itemsku_id = $request->itemsku;
        $sku_count = Sales::where('itemsku_id', $itemsku_id)->where('budget_year', $final_budget_year)->count();

        if ($final_budget_year < $input_budget_year) {
            $sale_voucher_sku_id = 1;
        } else {
            $sale_voucher_sku_id = $sku_count;
            $sale_voucher_sku_id++;
        }

        $record = date('H:i');
        // $record = (int)$record;
        // dd($record);

        $timestamp = strtotime(today());

        $day = date('D', $timestamp);

        if ($day == "Sun") {
            Carbon::today();
            $r_date = Carbon::today()->addDay(1, 'day')->format('Y-m-d');
        } elseif ($day == "Sat") {
            Carbon::today();
            $r_date = Carbon::today()->addDay(2, 'day')->format('Y-m-d');
        } elseif ($day == "Fri" && $record > 13) {
            Carbon::today();
            $r_date = Carbon::today()->addDay(3, 'day')->format('Y-m-d');
        } elseif ($record > 13) {
            Carbon::today();
            $r_date = Carbon::today()->addDay(1, 'day')->format('Y-m-d');
        } else {
            $r_date = Carbon::today()->format('Y-m-d');
        }

        // dd($r_date);

        $sale_voucher = $request->sale_voucher;
        $db_voucher = Sales::where('sale_voucher', '=',  $request->sale_voucher)->get();


        if (count($db_voucher) > 0) {

            $sale_voucher = Sales::orderBy('id', 'desc')->first('sale_voucher')->sale_voucher;

            $sale_voucher = explode("-", $sale_voucher);
            $sale_voucher_first_index = $sale_voucher[0];
            $sale_voucher = $sale_voucher_first_index . '-' . $sale_voucher[count($sale_voucher) - 1] + 1;
        }

        $inches = $request->quantity;
        $times = $request->times;

        $total_inches = $inches * $times;
        // dd($inches, $times, $total_inches);

        $sales = new Sales;

        $sales->customer_id = $request->customer_id;
        $sales->record_date = $r_date;
        $sales->item_id = $request->item_id;
        $sales->itemsku_id = $request->itemsku;
        $sales->description = $request->description;
        $sales->sale_voucher = $sale_voucher;
        $sales->sale_voucher_sku = $request->sale_voucher_sku;
        $sales->sale_voucher_sku_id = $sale_voucher_sku_id;
        $sales->sale_date = $request->sale_date;
        $sales->budget_year = $request->budget_year;
        $sales->specified_date = $request->specified_date;
        $sales->received_date = $request->received_date;
        $sales->inches = $request->inches;
        $sales->total_inches = $total_inches;
        $sales->columns = $request->columns;
        $sales->quantity = $request->quantity;
        $sales->times = $request->times;
        $sales->price = $request->price;
        $sales->timeprice = $request->timeprice;
        $sales->total_price = $request->total_price;
        $sales->discount_amount = $request->discount_amount;
        $sales->change_date_status = "0";
        $sales->comments = $request->comments;
        $sales->paid_id = $request->paid_id;
        $sales->total_amount = $request->total_amount;
        $sales->status = $request->status;
        $sales->payment_comment = $request->payment_comment;

        $sale = $sales->save();
        $this->log($sales->id, 'create', url()->full());


        return redirect('sales')->with('alertMsg', 'Successfully created!');
    }


    public function show($id)
    {
        $sales = Sales::findOrFail($id);
        return view('sales.show', compact('sales'));
    }

    public function edit(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Add':
                // Save model
                break;

            case 'Sub':
                // Preview model
                break;
        }


        $sales = Sales::findOrFail($id);
        $items = Item::all();
        $customers = Customer::all();
        $accounts = Account::all();
        return view('sales.edit', compact('items', 'customers', 'sales', 'accounts'));
    }

    public function update(Request $request, $id)
    {
        $sales = Sales::findOrFail($id);
        $sales->update($request->all());
        return redirect('sales');
    }

    public function destroy($id)
    {
        // $sales = Sales::findOrFail($id);
        // $sales->delete();
        // return redirect('sales');
    }


    public function changeStatus($id)
    {
        $sales = Sales::findOrFail($id);
        $sales->update(['cancel' => 1]);
        return redirect('sales');
    }

    public function showAll()
    {
        $sales = Sales::orderBy('id', 'desc')->paginate(25);
        return view('sales.index', compact('sales'));
    }

    public function search(Request $request)
    {
        $sales = Sales::where('sale_date', 'like', '%' . $request->search . '%')
            ->orWhereHas('customer', function ($customer) use ($request) {
                $customer->where('name', 'like', '%' . $request->search . '%');
            })
            ->orWhereHas('itemsku', function ($itemsku) use ($request) {
                $itemsku->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(200);
        return view('sales.index', compact('sales'));
    }
}
