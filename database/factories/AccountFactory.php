<?php

namespace Database\Factories;

use App\Models\AccountType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
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
            'account_type_id' =>  1,
            'start_balance' => fake()->numberBetween(1,1000),
            'current_balance' => fake()->numberBetween(1,1000),
            'parent_account_id' => null,
            'note' => fake()->paragraph,
            'status' => fake()->numberBetween(0, 1),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
