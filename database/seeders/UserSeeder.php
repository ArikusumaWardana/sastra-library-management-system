<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create test admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Library', 
            'email' => 'admin@library.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'status' => 'active'
        ]);

        // Create test staff user
        User::create([
            'first_name' => 'Staff',
            'last_name' => 'Library',
            'email' => 'staff@library.com', 
            'password' => bcrypt('password'),
            'role' => 'staff',
            'status' => 'active'
        ]);

        // Create random users via factory
        User::factory()->count(8)->create();
    }
}
