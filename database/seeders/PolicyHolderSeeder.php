<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PolicyHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policyHolders = [
            [
                'first_name' => 'Juan',
                'last_name' => 'Pérez',
                'address' => 'Calle 123, Ciudad',
                'phone' => '123-456-7890',
                'email' => 'juan@example.com',
            ],
            [
                'first_name' => 'María',
                'last_name' => 'Gómez',
                'address' => 'Avenida 456, Pueblo',
                'phone' => '987-654-3210',
                'email' => 'maria@example.com',
            ],
            [
                'first_name' => 'Carlos',
                'last_name' => 'Rodríguez',
                'address' => 'Carrera 789, Villa',
                'phone' => '555-123-4567',
                'email' => 'carlos@example.com',
            ],
            [
                'first_name' => 'Juan',
                'last_name' => 'González',
                'address' => 'Calle 123, Ciudad XYZ',
                'phone' => '555-1234',
                'email' => 'juan@example.com',
            ],
            [
                'first_name' => 'María',
                'last_name' => 'López',
                'address' => 'Avenida ABC, Ciudad ABC',
                'phone' => '555-5678',
                'email' => 'maria@example.com',
            ],
            [
                'first_name' => 'Carlos',
                'last_name' => 'Martínez',
                'address' => 'Carrera 456, Ciudad LMN',
                'phone' => '555-9876',
                'email' => 'carlos@example.com',
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Ramírez',
                'address' => 'Calle 789, Ciudad PQR',
                'phone' => '555-4321',
                'email' => 'ana@example.com',
            ],
            [
                'first_name' => 'Luis',
                'last_name' => 'García',
                'address' => 'Avenida XYZ, Ciudad XYZ',
                'phone' => '555-8765',
                'email' => 'luis@example.com',
            ],
        ];

        foreach ($policyHolders as $policyHolder) {
            DB::table('policy_holders')->insert($policyHolder);
        }
    }
}
