<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InsuranceLine;
use Illuminate\Support\Facades\DB;

class InsuranceLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insuranceLinesData = [
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Automóviles',
                'description' => 'Tu seguridad en la carretera es nuestra prioridad. Protegemos tu vehículo y a ti en caso de cualquier imprevisto.',
                'image' => 'lines/auto_insurance.jpg', // Ruta a la imagen o el nombre del archivo
                'is_active'             => fake()->boolean(90),
            ],
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Vivienda',
                'description' => 'Protegemos tu hogar contra riesgos como incendios, robos y daños estructurales, brindándote tranquilidad y seguridad.',
                'image' => 'lines/home_insurance.jpg',
                'is_active'             => fake()->boolean(90),
            ],
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Salud',
                'description' => 'Cuida de tu bienestar y el de tu familia. Nuestro seguro de salud ofrece cobertura integral para gastos médicos y hospitalarios.',
                'image' => 'lines/health_insurance.jpg',
                'is_active'             => fake()->boolean(90),
            ],
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Viaje',
                'description' => 'Viaja con confianza. Nuestro seguro de viaje te protege ante imprevistos, como cancelaciones, pérdida de equipaje y asistencia médica en el extranjero.',
                'image' => 'lines/travel_insurance.jpg',
                'is_active'             => fake()->boolean(90),
            ],
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Vida',
                'description' => 'Protege el futuro de tus seres queridos. Nuestro seguro de vida ofrece cobertura en caso de fallecimiento, proporcionando apoyo financiero y seguridad económica.',
                'image' => 'lines/life_insurance.jpg',
                'is_active'             => fake()->boolean(90),
            ],
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Negocios',
                'description' => 'Asegura la continuidad de tu empresa. Ofrecemos soluciones de seguros para proteger tus activos, responsabilidad civil y mantener la estabilidad financiera de tu negocio.',
                'image' => 'lines/business_insurance.jpg',
                'is_active'             => fake()->boolean(90),
            ],
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Mascotas',
                'description' => 'Protege a tu mejor amigo. Nuestro seguro de mascotas cubre gastos veterinarios, cuidados preventivos y situaciones imprevistas que puedan afectar la salud de tu mascota.',
                'image' => 'lines/pet_insurance.jpg',
                'is_active'             => fake()->boolean(90),
            ],
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Salud Empresarial',
                'description' => 'Cuida de la salud de tus empleados. Nuestro seguro de salud empresarial proporciona cobertura integral para gastos médicos y promueve el bienestar de tu equipo.',
                'image' => 'lines/business_health_insurance.jpg',
                'is_active'             => fake()->boolean(90),
            ],
            [
                'insurance_company_id'  => fake()->numberBetween(1, 17),
                'name' => 'Seguro de Educación',
                'description' => 'Invierte en el futuro de tus seres queridos. Nuestro seguro de educación proporciona beneficios para la educación de tus hijos, asegurando su crecimiento académico.',
                'image' => 'lines/education_insurance.jpg',
                'is_active'             => fake()->boolean(90),
            ],
        ];

        foreach ($insuranceLinesData as $lineData) {
            \App\Models\InsuranceLine::create($lineData);
        }
    }
}
