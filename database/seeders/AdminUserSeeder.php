<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{

    public function run()
    {
        // Create the admin user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin1@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    
    }
    
}
