<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InsurancePlan>
 */
class InsurancePlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'insurance_line_id'  => fake()->numberBetween(1, 10),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'coverage' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 30, 200),
            'image' => 'plans/' . fake()->image('public/storage/plans', 640, 480, null, false),
            'is_active' => $this->faker->boolean(90), // 90% de probabilidad de ser activo
        ];
    }
}
