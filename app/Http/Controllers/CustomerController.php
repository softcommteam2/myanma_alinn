<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $customer= Customer::orderBy('id')->paginate(25);
        return view('customer.index', compact('customer'));
    }

    public function create()
    {
        $customer = new Customer();
        return view('customer.create', compact('customer'));

    }

    public function store(Request $request)
    {

        Customer::create($request->all());
        $url=url()->previous();
        $hostname = parse_url($url,PHP_URL_PATH);

        if ($hostname == "/customer/create"){

            return redirect('customer');
        }
        elseif($hostname == "/sales/create"){
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $customer=Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect('customer');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect('customer');
    }

    public function search(Request $request)
    {
        $customer= Customer::where('name', 'like', '%'.$request->search.'%')
        ->orWhere('address', 'like', '%'.$request->search.'%')
        ->orWhere('city', 'like', '%'.$request->search.'%')
        ->orWhere('township', 'like', '%'.$request->search.'%')
        ->paginate(25);

        return view('customer.index' , compact('customer'));
    }

    // api
    public function getCustomer($id) {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

}
