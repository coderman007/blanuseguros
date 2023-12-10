<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->name();

        return [
            'insurance_company_id'  => fake()->numberBetween(1, 18),
            'name'                  => $name,
            'description'           => $this->faker->sentence,
            'slug'                  => Str::slug($name),
            'is_active'             => $this->faker->boolean(90), // 90% de probabilidad de ser activo
            'image'                 => 'lines/' . fake()->image('public/storage/lines', 640, 480, null, false),
        ];
    }
}
