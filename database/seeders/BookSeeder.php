<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            Book::create([
                'title' => fake()->word(),
                'description' => fake()->paragraph(3, false),
                'pages' => fake()->numberBetween(100, 300),
                'cover' => 'https://picsum.photos/200?random=' . $i,
                'author' => fake()->name(),
                'amount' => fake()->numberBetween(5, 24),
                'release_date' => fake()->date('Y-m-d', '-10 years'),
            ]);
        }
    }
}
