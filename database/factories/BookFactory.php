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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'language'=>fake()->name(),
            'image'=>fake()->image(),
            'year'=>fake()->year(),
            'writer'=>fake()->name(),
            'pages'=>fake()->numberBetween(100,500),
            'description'=>fake()->text(),
        ];
    }
}
