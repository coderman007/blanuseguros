<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $firstName = fake('es_ES')->firstName('es_ES');
        $lastName = fake('es_ES')->lastName();
        return [
            'document'      => fake('es_ES')->numberBetween(1000000000, 9999999999),
            'first_name'    => $firstName,
            'last_name'     => $lastName,
            'address'       => fake('es_ES')->address(),
            'phone'         => fake('es_ES')->phoneNumber(),
            'email'         => fake('es_ES')->unique()->safeEmail(),
            'slug'          => Str::slug($firstName . $lastName),
            'is_active'     => fake()->randomElement([true, false]),
            'image'         => 'holders/' . fake()->image('public/storage/holders', 640, 480, null, false),

        ];
    }
}
