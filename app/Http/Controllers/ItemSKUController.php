<?php

namespace App\Http\Controllers;

use App\Models\ItemSKU;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemSkuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {
        $itemsku= ItemSKU::orderBy('id')->paginate(25);
        return view('itemsku.index', compact('itemsku'));
    }

    public function create()
    {
        $itemsku = new ItemSKU();
        $categories=ItemCategory::all();
        return view('itemsku.create', compact('itemsku', 'categories'));
    }

    public function store(Request $request)
    {
        ItemSKU::create($request->all());
        return redirect('itemsku');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $itemsku=ItemSKU::findOrFail($id);
        $categories=ItemCategory::all();
        return view('itemsku.edit', compact('itemsku', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $itemsku = ItemSKU::findOrFail($id);
        $itemsku->update($request->all());
        return redirect('itemsku');
    }

    public function destroy($id)
    {
        $itemsku = ItemSKU::findOrFail($id);
        $itemsku->delete();
        return redirect('itemsku');
    }

    public function search(Request $request)
    {
        $itemsku= ItemSKU::where('name', 'like', '%'.$request->search.'%')
        ->orWhereHas('category', function($category) use($request){
            $category->where('name', 'like', '%'.$request->search.'%');
        })
        ->paginate(25);

        return view('itemsku.index' , compact('itemsku'));
    }

}
