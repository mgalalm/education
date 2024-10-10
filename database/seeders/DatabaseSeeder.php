<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Talk;
use App\Models\User;
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

        User::factory()
            ->has(Talk::factory()->count(5))
            ->create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin'),
            ]);

        User::factory()
            ->has(Talk::factory()->count(5))
            ->create([
                'name' => 'editor',
                'email' => 'editor@example.com',
                'password' => bcrypt('editor'),
            ]);

        Conference::factory()->count(5)->create();
    }
}
