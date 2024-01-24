<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InsuranceLine>
 */
class InsuranceLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'insurance_company_id'  => fake()->numberBetween(1, 18),
            // 'name'                  => fake('es_ES')->name(),
            // 'description'           => fake('es_ES')->sentence(),
            // 'is_active'             => fake()->boolean(90), // 90% de probabilidad de ser true
            // 'image'                 => 'lines/' . fake()->image('public/storage/lines', 640, 480, null, false),
        
        ];
    }
}

// // Lista de ramos de seguros en español
// $insuranceLines = [
//     'Seguro de Vida',                    // Life Insurance
//     'Seguro de Salud',                   // Health Insurance
//     'Seguro de Propietarios de Viviendas', // Homeowners Insurance
//     'Seguro de Inquilinos',              // Renters Insurance
//     'Seguro de Propiedad',               // Property Insurance
//     'Seguro de Accidentes',              // Casualty Insurance
//     'Seguro de Viaje',                   // Travel Insurance
//     'Seguro de Negocios',                // Business Insurance
//     'Seguro de Compensación para Trabajadores',  // Workers' Compensation Insurance
//     'Seguro de Propiedad Comercial',     // Commercial Property Insurance
//     'Seguro de Responsabilidad Profesional',  // Professional Liability Insurance
//     'Seguro Paraguas',                   // Umbrella Insurance
//     'Seguro Marítimo',                   // Marine Insurance
//     'Seguro Agrícola',                   // Crop Insurance
//     'Seguro para Mascotas',              // Pet Insurance
//     'Seguro contra Inundaciones',        // Flood Insurance
//     'Seguro Cibernético',                // Cyber Insurance

//     // Ramos de seguros con propiedades adicionales en la base de datos
//     'Seguro de Cumplimiento',            // Compliance Insurance
//     'Seguro de Responsabilidad Civil',   // Liability Insurance
//     'Seguro de Automóvil',               // Auto Insurance
//     // Subcategorías del seguro de automóvil                   
//     'Cobertura de Colisión',             // Collision Coverage
//     'Cobertura Integral',                // Comprehensive Coverage
//     'Cobertura de Responsabilidad',      // Liability Coverage
//     'Protección contra Lesiones Personales (PIP)',  // Personal Injury Protection (PIP)
//     'Cobertura de Conductor No Asegurado o con Seguro Insuficiente',   // Uninsured/Underinsured Motorist
//     'Reembolso de Alquiler de Vehículos',  // Rental Reimbursement
//     'Seguro para Vehículos Pesados',     // Heavy Vehicles Insurance
//     'Seguro de Carga para Vehículos Pesados',  // Cargo Insurance

//     'Fianza',                            // Surety Bond (aunque técnicamente no es un seguro, es un instrumento financiero relacionado)
// ];

// // Agregar los ramos a la base de datos
// foreach ($insuranceLines as $line) {
//     \App\Models\InsuranceLine::factory()->create(['name' => $line]);
// }
