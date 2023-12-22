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
            'insurance_line_id' => fake()->numberBetween(1, 15),
            'name'              => fake('es_ES')->name(),
            'description'       => fake('es_ES')->sentence(),
            'coverage'          => fake('es_ES')->paragraph(),
            'price'             => fake()->randomFloat(2, 30, 200),
            'is_active'         => fake()->boolean(90), // 90% de probabilidad de ser true
            'image'             => 'plans/' . fake()->image('public/storage/plans', 640, 480, null, false),
        ];
    }
}
