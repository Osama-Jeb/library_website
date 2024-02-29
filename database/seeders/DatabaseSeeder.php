<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Book::factory(50)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Comment::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'oussama',
            'email' => 'email@email.com',
            'password' => Hash::make('password'),
            'role' => 'ADMIN',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
        ]);

        
        $this->call([
            BookSeeder::class,
            BookCategorySeeder::class,
        ]);
    }
}
