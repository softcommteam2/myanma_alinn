<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemSKU;
class ItemController extends Controller
{
    public function index(Request $request){



        $itemsku = ItemSKU::where("category_id", $request->category_id)->get();
        // dd($itemsku);
        return response()->json($itemsku);
    }
}
