<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordItems extends Model
{
    public function items()
    {
        return this->hasOne(Items::class);
    }
    
    public function cateogry()
    {
        return this->hasOne(ItemCategory::class);
    }
}
