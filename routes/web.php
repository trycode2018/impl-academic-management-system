<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rotas Protegidas por Autenticação
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Dashboard – acessível a todos os autenticados
    // Se quiser restringir apenas a admin e secretaria, use middleware('role:admin,secretaria')
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Perfil do utilizador (alterar senha, etc.)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Rotas Exclusivas para Administradores
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

/*
|--------------------------------------------------------------------------
| Rotas para Secretaria e Administradores
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,secretaria'])->group(function () {
    Route::get('/secretaria', function () {
        return view('secretaria.index');
    })->name('secretaria.index');
});

/*
|--------------------------------------------------------------------------
| Rotas de Autenticação (geradas pelo Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';