<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'policy_holder_id'  => fake()->numberBetween(1, 10),
            'name' => fake('es_ES')->name(),
            'email' => fake('es_ES')->unique()->safeEmail(),
            'phone' => fake('es_ES')->phoneNumber(),
            'address' => fake('es_ES')->address(),
            'relationship' => fake()->randomElement(['Padre', 'Madre', 'Hijo', 'Hija', 'Hermano', 'Hermana', 'Esposo', 'Esposa', 'Otro']),
        ];
    }
}
