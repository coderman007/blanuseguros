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
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => 'lines/' . fake()->image('public/storage/lines', 640, 480, null, false),
            'is_active' => $this->faker->boolean(90), // 90% de probabilidad de ser activo
        ];
    }
}
