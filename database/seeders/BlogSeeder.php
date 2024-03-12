<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        // Obtén algunos usuarios existentes (asegúrate de tener usuarios creados)
        $users = User::all();

        // Crea blogs de prueba para cada usuario
        foreach ($users as $user) {
            Blog::factory(2)->create(['user_id' => $user->id]);
        }
    }
}
