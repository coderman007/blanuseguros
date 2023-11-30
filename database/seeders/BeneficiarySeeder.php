<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beneficiaries = [
            [
                'policy_holder_id' => 1,
                'name' => 'Laura González',
                'relationship' => 'Hija',
            ],
            [
                'policy_holder_id' => 2,
                'name' => 'Javier López',
                'relationship' => 'Hijo',
            ],
            [
                'policy_holder_id' => 3,
                'name' => 'Mónica Martínez',
                'relationship' => 'Esposa',
            ],
            [
                'policy_holder_id' => 4,
                'name' => 'Sara Ramírez',
                'relationship' => 'Hija',
            ],
            [
                'policy_holder_id' => 5,
                'name' => 'Pedro García',
                'relationship' => 'Hijo',
            ],
        ];

        foreach ($beneficiaries as $beneficiary) {
            DB::table('beneficiaries')->insert($beneficiary);
        }
    }
}
