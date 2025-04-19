<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        // Truncate the table to start fresh
        DB::table('users')->truncate();

        // Create Admin user
        DB::table('users')->insert([
            'name'      => 'admin',
            'email'     => 'admin@cgg.group',
            'phone'     => '1234567890',
            'role'      => 'admin',
            'password'  => Hash::make('kA5:Vw1aq8[(4zc@'),
            // Generate a unique API token for the admin
            'api_token' => Str::random(60),
            // Dummy CDN Image (placeholder)
            'image'     => 'https://cdn.it-cg.group/xerum/uploads/677207456fb81.jpg',
        ]);

        // Create Staff user
        DB::table('users')->insert([
            'name'      => 'staff',
            'email'     => 'staff@cgg.group',
            'phone'     => '1234567890',
            'role'      => 'staff',
            'password'  => Hash::make('staff'),
            // Generate a unique API token for the staff
            'api_token' => Str::random(60),
            // Dummy CDN Image (placeholder)
            'image'     => 'https://cdn.it-cg.group/xerum/uploads/677207456fb81.jpg',
        ]);
    }
}
