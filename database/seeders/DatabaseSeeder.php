<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(InsuranceCompanySeeder::class);
        $this->call(LineSeeder::class);
        $this->call(InsurancePlanSeeder::class);
        $this->call(PolicyHolderSeeder::class);
        $this->call(BeneficiarySeeder::class);
    }
}
