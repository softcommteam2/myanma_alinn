<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        Account::factory()->create([
            'name' => 'Cash',
            'status' => '1'
         ]);
        Account::factory()->create([
            'name' => 'Check',
            'status' => '1'
         ]);
        Account::factory()->create([
            'name' => 'Bank(SEE)',
            'status' => '1'
         ]);
    }
}
