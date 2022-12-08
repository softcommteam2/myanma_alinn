<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Sales extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'specified_date' => 'datetime:Y-m-d H:00',
        'received_date' => 'datetime:Y-m-d H:00',
        'record_date' => 'datetime:Y-m-d H:00',
        'sale_date' => 'datetime:Y-m-d H:00',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id')->withDefault()->withTrashed();
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id')->withDefault()->withTrashed();
    }

    public function itemsku()
    {
        return $this->belongsTo('App\Models\ItemSKU', 'itemsku_id')->withDefault()->withTrashed();
    }

    public function account()
    {
        return $this->belongsTo('App\Models\Account', 'paid_id')->withDefault()->withTrashed();
    }
}
