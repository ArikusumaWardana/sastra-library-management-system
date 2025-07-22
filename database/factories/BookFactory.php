<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'book_title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'year_published' => $this->faker->year(),
            'book_genre' => $this->faker->randomElement(['Fiksi', 'Non-Fiksi', 'Teknologi', 'Sains']),
            'book_description' => $this->faker->paragraph(),
            'book_stock' => $this->faker->numberBetween(1, 10),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
