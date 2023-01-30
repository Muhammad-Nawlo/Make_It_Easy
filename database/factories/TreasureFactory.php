<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treasure>
 */
class TreasureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->name(),
            'type'=>(int)fake()->boolean(),
            'status'=>(int)fake()->boolean(),
            'last_income_invoice_number'=>fake()->numberBetween(),
            'last_outcome_invoice_number'=>fake()->numberBetween(),
            'created_by'=>1,
            'updated_by'=>1,
        ];
    }
}
