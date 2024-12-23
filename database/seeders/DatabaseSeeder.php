<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use App\Models\Example;
// use App\Models\...;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // // User::factory(5)->unverified()->create();
        Todo::factory(25)->create();
        // Example::factory(5)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
