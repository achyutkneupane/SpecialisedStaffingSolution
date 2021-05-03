<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = User::create([
            'email' => 'manager@specialised.com',
            'password' => Hash::make('Manager@123'),
            'name' => 'SSS Manager',
            'role' => 'manager'
        ]);
        $user = User::create([
            'email' => 'employee1@specialised.com',
            'password' => Hash::make('Employee@123'),
            'name' => 'SSS Employee 1',
            'role' => 'employee'
        ]);
        $user = User::create([
            'email' => 'customer1@specialised.com',
            'password' => Hash::make('Customer@123'),
            'name' => 'SSS Customer 1',
            'role' => 'customer'
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
