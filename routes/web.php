<?php


use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;

// DB::listen(function ($query){
//     echo "<pre style='font-size: 10px'>{$query->sql}</pre>";
//     echo "<pre>{$query->time}</pre>";
// });


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Rutas Usuarios sin autenticación
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/',         [HomeController::class, 'home'])->name('home');
// Route::get('/about',    [HomeController::class, 'about'])->name('about');
// Route::get('/blog',     [HomeController::class, 'blog'])->name('blog');
// Route::get('/contact',  [HomeController::class, 'contact'])->name('contact');
// Route::get('/policies', [HomeController::class, 'policies'])->name('policies');
// Route::get('/services', [HomeController::class, 'services'])->name('services');
// Route::get('/terms',    [HomeController::class, 'terms'])->name('terms');



//Rutas para usuarios autenticados
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
