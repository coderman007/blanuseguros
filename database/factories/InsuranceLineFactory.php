<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InsuranceLine>
 */
class InsuranceLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'insurance_company_id'  => fake()->numberBetween(1, 18),
            'name'                  => fake('es_ES')->name(),
            'description'           => fake('es_ES')->sentence(),
            'is_active'             => fake()->boolean(90), // 90% de probabilidad de ser true
            'image'                 => 'lines/' . fake()->image('public/storage/lines', 640, 480, null, false),
        ];
    }
}
