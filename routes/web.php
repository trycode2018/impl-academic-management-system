<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\GroupController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentController;

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
    Route::resource('courses', CourseController::class);
    Route::resource('classes', ClassController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('groups', GroupController::class); // ou mantém só admin? Pode dar leitura à secretaria
});

/*
|--------------------------------------------------------------------------
| Rotas para Secretaria e Administradores
|--------------------------------------------------------------------------
*/
// Rotas para admin e secretaria
Route::middleware(['auth', 'role:admin,secretaria'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::resource('students', StudentController::class); // CRUD completo
    Route::resource('enrollments', EnrollmentController::class); // CRUD completo
    Route::get('/secretaria', function () { return view('secretaria.index'); })->name('secretaria.index');
});

Route::middleware(['auth', 'role:admin,secretaria'])->group(function () {
    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
    // sem store, update, destroy
});

/*
|--------------------------------------------------------------------------
| Rotas de Autenticação (geradas pelo Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';