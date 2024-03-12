<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insuranceCompanies = [
            [
                'name'      => 'Seguros Mundial',
                'url'       => 'https://www.segurosmundial.com.co/',
                'address'   => fake('es_ES')->address(),
                'phone'     => fake('es_ES')->phoneNumber(),
                'email'     => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/mundial_seguros.png',

            ],
            [
                'name' => 'Solunion',
                'url' => 'https://solunion.com/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/solunion.png',

            ],
            [
                'name' => 'Aseguradora Solidaria',
                'url' => 'https://aseguradorasolidaria.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/aseguradora_solidaria.png',
            ],

            [
                'name' => 'Liberty Seguros',
                'url' => 'https://www.libertyseguros.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/liberty.png',
            ],

            [
                'name' => 'Seguros Bolivar',
                'url' => 'https://www.segurosbolivar.com/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/bolivar.png',
            ],

            [
                'name' => 'Zurich',
                'url' => 'https://www.zurichseguros.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/zurich.jpg',
            ],

            [
                'name' => 'Allianz',
                'url' => 'https://www.allianz.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/allianz.png',
            ],

            [
                'name' => 'Equidad Seguros',
                'url' => 'https://www.laequidadseguros.coop/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/equidad.png',
            ],

            [
                'name' => 'MetLife',
                'url' => 'https://www.metlife.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/metlife.jpg',
            ],

            [
                'name' => 'Berkley',
                'url' => 'https://www.berkley.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/berkley.jpg',
            ],

            [
                'name' => 'Chubb Seguros',
                'url' => 'https://www.chubb.com/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/chubb.png',
            ],

            [
                'name' => 'Coface For Trade',
                'url' => 'https://www.coface.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/coface.jpg',
            ],

            [
                'name' => 'Confianza',
                'url' => 'https://www.confianza.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/confianza.jpg',
            ],

            [
                'name' => 'JMalucelli',
                'url' => 'https://www.jmtrv.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/jmalucelli.jpg',
            ],

            [
                'name' => 'Seguros del Estado',
                'url' => 'https://www.segurosdelestado.com/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/seguros_del_estado.jpg',
            ],

            [
                'name' => 'Mapfre',
                'url' => 'https://www.mapfre.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/mapfre.png',
            ],

            [
                'name' => 'Sura',
                'url' => 'https://www.segurossura.com.co/',
                'address' => fake('es_ES')->address(),
                'phone' => fake('es_ES')->phoneNumber(),
                'email' => fake('es_ES')->unique()->safeEmail(),
                'is_active' => fake()->boolean(90),
                'image'     => 'companies/sura.png',
            ],
        ];

        foreach ($insuranceCompanies as $company) {
            DB::table('insurance_companies')->insert($company);
        }
    }
}
