<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\insurancePlan>
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
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'coverage' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 30, 200),
            'active' => $this->faker->boolean(90), // 90% de probabilidad de ser activo
        ];
    }
}
