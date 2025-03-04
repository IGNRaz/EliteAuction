<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UsersDoc;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Notifications\Action;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            User::factory(10)->create(),

        ]);
    }
}
