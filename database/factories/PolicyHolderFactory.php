<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PolicyHolder>
 */
class PolicyHolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document' => fake('es_ES')->numberBetween(1000000000, 9999999999),
            'first_name' => fake('es_ES')->firstName(),
            'last_name' => fake('es_ES')->lastName(),
            'address' => fake('es_ES')->address(),
            'phone' => fake('es_ES')->phoneNumber(),
            'email' => fake('es_ES')->unique()->safeEmail(),
        ];
    }
}
