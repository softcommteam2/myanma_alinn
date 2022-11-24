<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemCategory;

class ItemCategorySeeder extends Seeder
{
    public function run()
    {
        //1
        ItemCategory::factory()->create([
            'name' => 'လူမူရေး',
            'description' => 'လူမူရေး ကြောငြာများ',
            'status' => '1'
         ]);
         //2
         ItemCategory::factory()->create([
            'name' => 'နိုင်ငံခြား',
            'description' => 'နိုင်ငံခြားရေး နှင့် ပတ်သက်သော ကြောငြာများ',
            'status' => '1'
         ]);
         //3
         ItemCategory::factory()->create([
            'name' => 'အစိုးရ',
            'description' => 'အစိုးရ နှင့် ပတ်သက်သော ကြောငြာများ',
            'status' => '1'
         ]);
         //4
         ItemCategory::factory()->create([
            'name' => 'စီးပွားရေး',
            'description' => 'စီးပွားရေး နှင့် ပတ်သက်သော ကြောငြာများ',
            'status' => '1'
         ]);
         //5
         ItemCategory::factory()->create([
            'name' => 'နာရေး',
            'description' => 'နာရေး နှင့် ပတ်သက်သော ကြောငြာများ',
            'status' => '1'
         ]);
         //6
         ItemCategory::factory()->create([
            'name' => 'နိုင်(ဟိုတယ်/ ခရီးသွားလုပ်ငန်းများ)',
            'description' => 'နိုင်(ဟိုတယ်/ ခရီးသွားလုပ်ငန်းများ)',
            'status' => '1'
         ]);
         //7
         ItemCategory::factory()->create([
            'name' => 'နိုင်(နိုင်ငံခြားကုန်ပစ္စည်း)',
            'description' => 'နိုင်(နိုင်ငံခြားကုန်ပစ္စည်း)',
            'status' => '1'
         ]);
         //8
         ItemCategory::factory()->create([
            'name' => 'နိုင်(နိုင်ငံခြားကုမ္မဏီ/အဖွဲ့အစည်းများ)',
            'description' => 'နိုင်(နိုင်ငံခြားကုမ္မဏီ/အဖွဲ့အစည်းများ)',
            'status' => '1'
         ]);
         //9
         ItemCategory::factory()->create([
            'name' => 'နိုင်ငံခြားကုန်ပစ္စည်း(နိုင်-‌ ရှေ့ဖုံး)',
            'description' => 'နိုင်ငံခြားကုန်ပစ္စည်း(နိုင်-‌ ရှေ့ဖုံး)',
            'status' => '1'
         ]);
         //10
         ItemCategory::factory()->create([
            'name' => 'နိုင်ငံခြားကုန်ပစ္စည်း(နိုင်-‌ နောက်စာမျက်နှာ)',
            'description' => 'နိုင်ငံခြားကုန်ပစ္စည်း(နိုင်-‌ နောက်စာမျက်နှာ)',
            'status' => '1'
         ]);
         //11
         ItemCategory::factory()->create([
            'name' => 'ပြည်တွင်းစီးပွာရေး (စီး-ရှေ့ဖုံး)',
            'description' => 'ပြည်တွင်းစီးပွာရေး (စီး-ရှေ့ဖုံး)',
            'status' => '1'
         ]);
         //12
         ItemCategory::factory()->create([
            'name' => 'ပြည်တွင်းစီးပွား‌ေရး (စီး-‌ ‌နောက်စာမျက်နှာ)',
            'description' => 'ပြည်တွင်းစီးပွား‌ေရး (စီး-‌ ‌နောက်စာမျက်နှာ)',
            'status' => '1'
         ]);

    }
}
