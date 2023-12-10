<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake('es_ES')->name('es_ES');
        return [
            'policy_holder_id'  => fake()->numberBetween(1, 10),
            'document'          => fake('es_ES')->numberBetween(1000000000, 9999999999),
            'name'              => $name,
            'email'             => fake('es_ES')->unique()->safeEmail(),
            'phone'             => fake('es_ES')->phoneNumber(),
            'address'           => fake('es_ES')->address(),
            'slug'              => Str::slug($name),
            'is_active'         => fake()->randomElement([true, false]),
            'relationship'      => fake()->randomElement([
                'Padre', 'Madre', 'Hijo', 'Hija', 'Hermano', 'Hermana', 'Esposo',
                'Esposa', 'Otro'
            ]),
            'image'             => 'beneficiaries/' . fake()->image('public/storage/beneficiaries', 640, 480, null, false),
        ];
    }
}
