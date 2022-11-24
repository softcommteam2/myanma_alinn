<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        $accounts= Account::paginate(25);
        return view('account.index', compact('accounts'));
    }

    public function create()
    {
        $accounts = new Account();
        return view('account.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        Account::create($request->all());
        return redirect('accounts');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $accounts=Account::findOrFail($id);
        return view('account.edit', compact('accounts'));
    }

    public function update(Request $request, $id)
    {
        $accounts = Account::findOrFail($id);
        $accounts->update($request->all());
        return redirect('accounts');
    }

    public function destroy($id)
    {
        $accounts = Account::findOrFail($id);
        $accounts->delete();

        return redirect('accounts');
    }

    public function search(Request $request)
    {
        $accounts= Account::where('name', 'like', '%'.$request->search.'%')
        ->paginate(25);

        return view('account.index' , compact('accounts'));
    }
}
