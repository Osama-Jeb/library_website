<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(3, false),
            'pages' => $this->faker->numberBetween(100, 300),
            'cover' => $this->faker->imageUrl(),
            'author' => $this->faker->name(),
            'amount' => $this->faker->numberBetween(5, 24),
        ];
    }
}
