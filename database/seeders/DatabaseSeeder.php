<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'aa',
            'email' => 'aa@mail.com',
            'password' => '$2y$10$Pzk9ojKHHRkvzdXYZ0C1HOS1wvISDKXD..rCTzTJjw0koIH2GDWgG',
            'role_id' => '1',
            'status' => '1'
        ]);
        User::factory()->create([
            'name' => 'mm',
            'email' => 'mm@mail.com',
            'password' => '$2y$10$Pzk9ojKHHRkvzdXYZ0C1HOS1wvISDKXD..rCTzTJjw0koIH2GDWgG',
            'role_id' => '2',
            'status' => '1'
        ]);
        User::factory()->create([
            'name' => 'cc',
            'email' => 'cc@mail.com',
            'password' => '$2y$10$Pzk9ojKHHRkvzdXYZ0C1HOS1wvISDKXD..rCTzTJjw0koIH2GDWgG',
            'role_id' => '3',
            'status' => '1'
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => '1',
            'status' => '1',
        ]);

        $this->call([
            ItemCategorySeeder::class,
            AccountSeeder::class,
            ItemSkuSeeder::class,
            RoleSeeder::class,
            ItemSeeder::class
        ]);
    }
}
