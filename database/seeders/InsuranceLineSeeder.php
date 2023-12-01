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
        // $lines = [
        //     [
        //         'name' => 'Vida',
        //         'description' => 'Seguros de Vida',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        //     [
        //         'name' => 'Automóvil',
        //         'description' => 'Seguros de Automóvil',
        //         'image' => 'images/lines/auto.jpeg'
        //     ],
        //     [
        //         'name' => 'Hogar',
        //         'description' => 'Seguros de Hogar',
        //         'image' => 'images/lines/hogar.jpeg'
        //     ],

        //     [
        //         'name' => 'Salud',
        //         'description' => 'Seguros médicos para gastos de salud.',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        //     [
        //         'name' => 'Empresarial',
        //         'description' => 'Seguros para proteger negocios y empresas.',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        //     [
        //         'name' => 'Responsabilidad Civil',
        //         'description' => 'Seguros para cubrir responsabilidades legales.',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        //     [
        //         'name' => 'Viajes',
        //         'description' => 'Seguros para proteger durante viajes y vacaciones.',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        //     [
        //         'name' => 'Ciberseguridad',
        //         'description' => 'Seguros contra ataques y pérdida de datos en línea.',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        //     [
        //         'name' => 'Agropecuario',
        //         'description' => 'Seguros para proteger la producción agropecuaria.',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        //     [
        //         'name' => 'Inundación',
        //         'description' => 'Seguros para cubrir daños por inundaciones.',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        //     [
        //         'name' => 'Mascotas',
        //         'description' => 'Seguros para cuidados médicos de mascotas.',
        //         'image' => 'images/lines/arbol.jpeg'
        //     ],
        // ];

        // foreach ($lines as $line) {
        //     DB::table('lines')->insert($line);
        // }
        InsuranceLine::factory(10)->create();
    }
}
