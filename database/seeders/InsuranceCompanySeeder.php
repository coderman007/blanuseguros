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
                'name' => 'Seguros Mundial',
                'url' => 'https://www.segurosmundial.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],
            [
                'name' => 'Solunion',
                'url' => 'https://solunion.com/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],
            [
                'name' => 'Aseguradora Solidaria',
                'url' => 'https://aseguradorasolidaria.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Expertos en Seguros de Crédito',
                'url' => 'https://www.expertosensegurosdecredito.com/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Liberty Seguros',
                'url' => 'https://www.libertyseguros.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Seguros Bolivar',
                'url' => 'https://www.segurosbolivar.com/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Zurich',
                'url' => 'https://www.zurichseguros.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Allianz',
                'url' => 'https://www.allianz.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Equidad Seguros',
                'url' => 'https://www.laequidadseguros.coop/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'MetLife',
                'url' => 'https://www.metlife.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Berkley',
                'url' => 'https://www.berkley.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Chubb Seguros',
                'url' => 'https://www.chubb.com/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Coface For Trade',
                'url' => 'https://www.coface.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Confianza',
                'url' => 'https://www.confianza.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'JMalucelli',
                'url' => 'https://www.jmtrv.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Seguros del Estado',
                'url' => 'https://www.segurosdelestado.com/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Mapfre',
                'url' => 'https://www.mapfre.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],

            [
                'name' => 'Sura',
                'url' => 'https://www.segurossura.com.co/',
                'address' => 'Cll. Example 123',
                'phone' => '1254569',
                'email' => 'correo@example.com',
            ],


        ];

        foreach ($insuranceCompanies as $company) {
            DB::table('insurance_companies')->insert($company);
        }
    }
}
