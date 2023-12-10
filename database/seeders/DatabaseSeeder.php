<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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


        Storage::deleteDirectory('users');
        Storage::makeDirectory('users');

        Storage::deleteDirectory('companies');
        Storage::makeDirectory('companies');

        Storage::deleteDirectory('lines');
        Storage::makeDirectory('lines');

        Storage::deleteDirectory('plans');
        Storage::makeDirectory('plans');

        Storage::deleteDirectory('holders');
        Storage::makeDirectory('holders');

        Storage::deleteDirectory('beneficiaries');
        Storage::makeDirectory('beneficiaries');


        $this->call(UserSeeder::class);
        $this->call(InsuranceCompanySeeder::class);
        $this->call(InsuranceLineSeeder::class);
        $this->call(InsurancePlanSeeder::class);
        $this->call(PolicyHolderSeeder::class);
        $this->call(BeneficiarySeeder::class);
    }
}
