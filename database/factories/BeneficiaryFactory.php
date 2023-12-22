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
            'document'          => fake()->numberBetween(1000000000, 9999999999),
            'name'              => fake('es_ES')->name(),
            'email'             => fake('es_ES')->unique()->safeEmail(),
            'phone'             => fake()->phoneNumber(),
            'address'           => fake('es_ES')->address(),
            'is_active'         => fake()->boolean(90), // 90% de probabilidad de ser true
            'relationship'      => fake()->randomElement([
                'Padre', 'Madre', 'Hijo', 'Hija', 'Hermano', 'Hermana', 'Esposo',
                'Esposa', 'Otro'
            ]),
            'image'             => 'beneficiaries/' . fake()->image('public/storage/beneficiaries', 640, 480, null, false),
        ];
    }
}
