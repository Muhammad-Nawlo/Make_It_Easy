<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountType>
 */
class AccountTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->text,
            'status' => fake()->numberBetween(0, 1),
            'related_internal_account' => fake()->numberBetween(0, 1),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
