<?php

namespace Database\Seeders;

use App\Models\Dish;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TableTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     UserSeeder::class,
        //     TableTableSeeder::class,

        // ]);

        Dish::factory()->count(10)->create();
        Category::factory()->count(5)->create();
    }
}
