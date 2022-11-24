<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class ItemCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login', 'show']]);
    }

    public function index()
    {
        $category= ItemCategory::orderBy('id')->paginate(25);

        return view('category.index', compact('category'));
    }

    public function create()
    {
        $category = new ItemCategory();
        return view('category.create', compact('category'));
    }

    public function store(Request $request)
    {
        ItemCategory::create($request->all());
        return redirect('category');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = ItemCategory::findOrFail($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ItemCategory::findOrFail($id);
        $category->update($request->all());
        return redirect('category');
    }

    public function destroy($id)
    {
        $category = ItemCategory::findOrFail($id);
        $category->delete();
        return redirect('category');
    }

    public function changeStatus( $id)
    {
        ItemCategory::findOrFail($id)->update(['status' => 2]);

        return redirect('category');
    }

    public function search(Request $request)
    {
        $category= ItemCategory::where('name', 'like', '%'.$request->search.'%')
        ->paginate(25);

        return view('category.index' , compact('category'));
    }
}
