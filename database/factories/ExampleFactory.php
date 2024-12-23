<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Example>
 */
class ExampleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'qty' => fake()->numberBetween(1, 100),
            'price' => fake()->randomFloat(2, 10000, 50000),
            'desc' => fake()->paragraph(20, true),
        ];
    }
}
