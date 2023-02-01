<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'line_1' => fake()->numberBetween('1', '200') . ' ' . fake()->streetName(),
            'line_2' => fake()->optional(50)->city(),
            'postcode' => fake()->postcode(),
        ];
    }
}
