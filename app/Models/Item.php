<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'category_id',
        'itemsku_id',
        'price',
        'cost_price',
        'brand',
        'name',
        'stock_amount',
        'description',
        'status'
    ];

    public function category(){
        return $this->belongsTo('App\Models\ItemCategory','category_id')->withDefault()->withTrashed();
    }
    public function itemsku(){
        return $this->belongsTo('App\Models\ItemSKU','itemsku_id')->withDefault()->withTrashed();
    }
}
