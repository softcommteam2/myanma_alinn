<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemSku extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'name',
        'category_id',
        'status'
    ];

    public function category(){
        return $this->belongsTo('App\Models\ItemCategory','category_id')->withDefault()->withTrashed();
    }

}
