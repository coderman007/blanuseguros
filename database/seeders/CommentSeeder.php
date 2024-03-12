<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtén algunos blogs existentes (asegúrate de tener blogs creados)
        $blogs = Blog::all();

        // Crea comentarios de prueba para cada blog
        foreach ($blogs as $blog) {
            Comment::factory(2)->create([
                'user_id' => User::inRandomOrder()->first()->id,
                'blog_id' => $blog->id,
            ]);
        }
    }
}
