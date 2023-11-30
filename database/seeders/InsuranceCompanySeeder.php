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
            ],
            [
                'name' => 'Solunion',
                'url' => 'https://solunion.com/',
            ],
            [
                'name' => 'Aseguradora Solidaria',
                'url' => 'https://aseguradorasolidaria.com.co/'
            ],

            [
                'name' => 'Expertos en Seguros de Crédito',
                'url' => 'https://www.expertosensegurosdecredito.com/',
            ],

            [
                'name' => 'Liberty Seguros',
                'url' => 'https://www.libertyseguros.com.co/',
            ],

            [
                'name' => 'Seguros Bolivar',
                'url' => 'https://www.segurosbolivar.com/',
            ],

            [
                'name' => 'Zurich',
                'url' => 'https://www.zurichseguros.com.co/',
            ],

            [
                'name' => 'Allianz',
                'url' => 'https://www.allianz.co/',
            ],

            [
                'name' => 'Equidad Seguros',
                'url' => 'https://www.laequidadseguros.coop/',
            ],

            [
                'name' => 'MetLife',
                'url' => 'https://www.metlife.com.co/',
            ],

            [
                'name' => 'Berkley',
                'url' => 'https://www.berkley.com.co/',
            ],

            [
                'name' => 'Chubb Seguros',
                'url' => 'https://www.chubb.com/',
            ],

            [
                'name' => 'Coface For Trade',
                'url' => 'https://www.coface.com.co/',
            ],

            [
                'name' => 'Confianza',
                'url' => 'https://www.confianza.com.co/',
            ],

            [
                'name' => 'JMalucelli',
                'url' => 'https://www.jmtrv.com.co/',
            ],

            [
                'name' => 'Seguros del Estado',
                'url' => 'https://www.segurosdelestado.com/',
            ],

            [
                'name' => 'Mapfre',
                'url' => 'https://www.mapfre.com.co/',
            ],

            [
                'name' => 'Sura',
                'url' => 'https://www.segurossura.com.co/',
            ],


        ];

        foreach ($insuranceCompanies as $company) {
            DB::table('insurance_companies')->insert($company);
        }
    }
}
