<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Users\Users;
use App\Http\Livewire\Lines\InsuranceLines;
use App\Http\Livewire\Lines\LinesList;
use App\Http\Livewire\Plans\InsurancePlans;
use App\Http\Livewire\Companies\InsuranceCompanies;
use App\Http\Livewire\Companies\InsuranceCompanyCreate;
use App\Http\Livewire\Holders\PolicyHolders;
use App\Http\Livewire\Policies\InsurancePolicies;

//Rutas Usuarios sin autenticación


Route::get('/',         [HomeController::class, 'home'])->name('home');
Route::get('/about',    [HomeController::class, 'about'])->name('about');
Route::get('/blog',     [HomeController::class, 'blog'])->name('blog');
Route::get('/contact',  [HomeController::class, 'contact'])->name('contact');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/terms',    [HomeController::class, 'terms'])->name('terms');
Route::get('/lines-list', [HomeController::class, 'linesList'])->name('lines-list');


//Rutas para usuarios autenticados
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::middleware(['checkRole:admin,developer'])->group(function () {
        Route::get('/users', Users::class)->name('users');
        Route::get('/companies', InsuranceCompanies::class)->name('companies');
        Route::get('/companies/create', InsuranceCompanyCreate::class)->name('companies');
        Route::get('/holders', PolicyHolders::class)->name('holders');
        Route::get('/lines', InsuranceLines::class)->name('lines');
        Route::get('/plans', InsurancePlans::class)->name('plans');
        Route::get('/policies', InsurancePolicies::class)->name('policies');
    });
});
