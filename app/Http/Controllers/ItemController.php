<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemSKU;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {
        $items=Item::orderBy('id')->paginate(25);
        $categories=ItemCategory::all()->pluck('name','id');
        $itemsku=ItemSKU::all();
        return view('items.index', compact('items','categories', 'itemsku'));
    }

    public function create()
    {
        $items= new Item();
        $categories=ItemCategory::all();
        $itemsku=ItemSKU::all();

        return view('items.create',compact('items', 'categories', 'itemsku'));
    }

    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect('items');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $items= Item::findOrFail($id);
        $categories= ItemCategory::all();
        $itemsku= ItemSKU::all();
        return view('items.edit', compact('items', 'itemsku', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $items = Item::findOrFail($id);
        $items->update($request->all());
        return redirect('items');
    }

    public function destroy($id)
    {
        // $items = Item::findOrFail($id);
        // $items->delete();
        // return redirect('items');
    }


    public function getSKU(Request $request)
    {
        $itemsku = ItemSKU::where("category_id", $request->category_id)->pluck("itemsku","id");

        return response()->json($itemsku);
    }

    public function changeStatus( $id)
    {
        Item::findOrFail($id)->update(['status' => 2]);

        return redirect('items');
    }

    public function search(Request $request)
    {
        $items= Item::where('name', 'like', '%'.$request->search.'%')
        ->orWhereHas('category', function($category) use($request){
            $category->where('name', 'like', '%'.$request->search.'%');
        })
        ->orWhereHas('itemsku', function($itemsku) use($request){
            $itemsku->where('name', 'like', '%'.$request->search.'%');
        })
        ->paginate(25);

    return view('items.index' , compact('items'));
    }
}
