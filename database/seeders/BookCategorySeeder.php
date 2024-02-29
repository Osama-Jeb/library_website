<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 50; $i++) {
            BookCategory::create([
                'book_id' => fake()->numberBetween(1, 50),
                'category_id' => fake()->numberBetween(1, 5),
            ]);
        }
    }
}
