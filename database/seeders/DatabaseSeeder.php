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
        User::create([
            'email' => 'manager@specialised.com',
            'password' => Hash::make('Manager@123'),
            'name' => 'SSS Manager',
            'role' => 'manager'
        ]);
        for($i = 1; $i<=15 ; $i++) {
        User::create([
            'email' => 'employee'.$i.'@specialised.com',
            'password' => Hash::make('Employee@123'),
            'name' => 'SSS Employee '.$i,
            'role' => 'employee'
        ]);
        }
        for($i = 1; $i<=15 ; $i++) {
        User::create([
            'email' => 'customer'.$i.'@specialised.com',
            'password' => Hash::make('Customer@123'),
            'name' => 'SSS Customer '.$i,
            'role' => 'customer'
        ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}
