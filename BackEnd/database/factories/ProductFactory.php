<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(2),
            'image' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2, 10, 1000000),
            'amount' => fake()->randomFloat(2, 1, 1000),
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
