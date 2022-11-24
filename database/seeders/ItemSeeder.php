<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::factory()->create([
            'category_id'=>'1',
            'itemsku_id'=>'2',
            'price'=>'1000',
            'cost_price'=>'-',
            'brand'=>'-',
            'name'=>'လူမူရေးလူ-၁၀',
            'stock_amount'=>'-',
            'description'=>'This is the description of the item 1',
            'status'=> '1'
            ]);

        Item::factory()->create([
            'category_id'=>'2',
            'itemsku_id'=>'1',
            'price'=>'10000',
            'cost_price'=>'-',
            'brand'=>'-',
            'name'=>'နိုင်ငံခြားစိုး-၁၀',
            'stock_amount'=>'-',
            'description'=>'This is the description of the item 2',
            'status'=> '1'
            ]);
        Item::factory()->create([
            'category_id'=>'4',
            'itemsku_id'=>'4',
            'price'=>'2000',
            'cost_price'=>'-',
            'brand'=>'-',
            'name'=>'စီးပွားရေး နာ-၅',
            'stock_amount'=>'-',
            'description'=>'This is the description of the item 3',
            'status'=> '1'
            ]);
        Item::factory()->create([
            'category_id'=>'5',
            'itemsku_id'=>'3',
            'price'=>'5000',
            'cost_price'=>'-',
            'brand'=>'-',
            'name'=>'နာရေး လူ-၆	',
            'stock_amount'=>'-',
            'description'=>'This is the description of the item 4',
            'status'=> '1'
            ]);
    }
}
