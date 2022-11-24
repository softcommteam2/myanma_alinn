<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::factory()->create([
            'name' => 'Admin',
            'status' => '1'
         ]);
        Role::factory()->create([
            'name' => 'Manager',
            'status' => '1'
         ]);
        Role::factory()->create([
            'name' => 'Cashier',
            'status' => '1'
         ]);
    }
}
