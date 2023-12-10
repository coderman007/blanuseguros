<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->name();
        return [
            'insurance_line_id' => fake()->numberBetween(1, 15),
            'name'              => $name,
            'description'       => $this->faker->sentence,
            'coverage'          => $this->faker->paragraph,
            'price'             => $this->faker->randomFloat(2, 30, 200),
            'slug'              => Str::slug($name),
            'is_active'         => $this->faker->boolean(90), // 90% de probabilidad de ser activo
            'image'             => 'plans/' . fake()->image('public/storage/plans', 640, 480, null, false),

        ];
    }
}
