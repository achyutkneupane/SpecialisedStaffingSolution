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
            'email' => 'info@specialised.com',
            'password' => Hash::make('Test@123'),
            'name' => 'Specialised Staffing Solutions'
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
