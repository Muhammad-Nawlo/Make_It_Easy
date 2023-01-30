<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->text(10),
            'status' => fake()->numberBetween(0, 1),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
