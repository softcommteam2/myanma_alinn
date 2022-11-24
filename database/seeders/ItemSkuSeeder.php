<?php

namespace Database\Seeders;

use App\Models\ItemSKU;
use Illuminate\Database\Seeder;

class ItemSKUSeeder extends Seeder
{
    public function run()
    {
        //1
        ItemSKU::factory()->create([
            'name' => 'စိုး-၁၀',
            'category_id' => '3',
            'status' => '1'
        ]);
         //2
        ItemSKU::factory()->create([
            'name' => 'လူ-၁၀',
            'category_id' => '1',
            'status' => '1'
        ]);
         //3
        ItemSKU::factory()->create([
            'name' => 'လူ-၆',
            'category_id' => '1',
            'status' => '1'
        ]);
         //4
        ItemSKU::factory()->create([
            'name' => 'နာ-၅',
            'category_id' => '5',
            'status' => '1'
        ]);
         //5
        ItemSKU::factory()->create([
            'name' => 'စီး-၁၂',
            'category_id' => '4',
            'status' => '1'
        ]);
         //6
        ItemSKU::factory()->create([
            'name' => 'စီး-၁၄',
            'category_id' => '4',
            'status' => '1'
        ]);
         //7
        ItemSKU::factory()->create([
            'name' => 'စစီး-၁၆',
            'category_id' => '4',
            'status' => '1'
        ]);
         //8
        ItemSKU::factory()->create([
            'name' => 'စီး-၁၈၅',
            'category_id' => '4',
            'status' => '1'
        ]);
         //9
        ItemSKU::factory()->create([
            'name' => 'စီး-၄၀',
            'category_id' => '11',
            'status' => '1'
        ]);
         //10
        ItemSKU::factory()->create([
            'name' => 'စီး-၃၀',
            'category_id' => '12',
            'status' => '1'
        ]);
         //11
        ItemSKU::factory()->create([
            'name' => 'နိုင်-၁၅',
            'category_id' => '6',
            'status' => '1'
        ]);
         //12
        ItemSKU::factory()->create([
            'name' => '	နိုင်-၃၀',
            'category_id' => '8',
            'status' => '1'
        ]);
         //13
        ItemSKU::factory()->create([
            'name' => 'နိုင်-၅၀',
            'category_id' => '7',
            'status' => '1'
        ]);
         //14
        ItemSKU::factory()->create([
            'name' => 'နိုင်-၆၀',
            'category_id' => '10',
            'status' => '1'
        ]);
         //15
        ItemSKU::factory()->create([
            'name' => 'နိုင်-၈၀',
            'category_id' => '9',
            'status' => '1'
        ]);
    }
}
