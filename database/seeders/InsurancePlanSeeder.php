<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InsurancePlan;
use Illuminate\Support\Facades\DB;

class InsurancePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $insurancePlans = [
        //     [
        //         'line_id' => 1, // Asociado a la línea de Vida
        //         'title' => 'Plan de Vida Básico',
        //         'description' => 'Cobertura esencial para asegurar la vida y proteger a los beneficiarios.',
        //         'coverage' => 'Muerte por cualquier causa',
        //         'price' => 50.00,
        //         'active' => true,
        //     ],
        //     [
        //         'line_id' => 2, // Asociado a la línea de Automóvil
        //         'title' => 'Seguro de Automóvil Estándar',
        //         'description' => 'Cobertura estándar para proteger tu vehículo y terceros en la carretera.',
        //         'coverage' => 'Daños al vehículo, responsabilidad civil, robo',
        //         'price' => 100.00,
        //         'active' => true,
        //     ],
        //     [
        //         'line_id' => 3, // Asociado a la línea de Hogar
        //         'title' => 'Seguro de Hogar Completo',
        //         'description' => 'Protección completa para tu hogar y pertenencias.',
        //         'coverage' => 'Incendios, robos, daños estructurales',
        //         'price' => 80.00,
        //         'active' => true,
        //     ],
        //     [
        //         'line_id' => 4, // Asociado a la línea de Salud
        //         'title' => 'Plan de Salud Familiar',
        //         'description' => 'Cobertura médica integral para toda la familia.',
        //         'coverage' => 'Consultas, hospitalización, medicamentos',
        //         'price' => 120.00,
        //         'active' => true,
        //     ],

        // ];

        // foreach ($insurancePlans as $insurancePlan) {
        //     DB::table('insurance_plans')->insert($insurancePlan);
        // }


        InsurancePlan::factory(30)->create();
    }
}
