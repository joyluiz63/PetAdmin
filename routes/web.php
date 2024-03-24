<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PetPhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacinaController;
use App\Models\Pet;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'pets' =>  Pet::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::resource('pets', PetController::class);
    //Route::resource('petsPhotos', PetPhotoController::class);

    Route::resources([
        'pets'          => PetController::class,
        'vacinas'       => VacinaController::class,
        'petsPhotos'    => PetPhotoController::class,
        'users'         => UserController::class,
        'medicamentos'  => MedicamentoController::class,
        'consultas'     => ConsultaController::class,
    ]);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/vacinas.meuPet/{id}', [VacinaController::class, 'meuPet'])->name('vacinas.meuPet');
    Route::get('vacinas/create/{petId}', [VacinaController::class, 'create'])->name('vacinas.create');
    Route::get('/medicamentos.meuPet/{id}', [MedicamentoController::class, 'meuPet'])->name('medicamentos.meuPet');
    Route::get('medicamentos/create/{petId}', [MedicamentoController::class, 'create'])->name('medicamentos.create');
    Route::get('/consultas.meuPet/{id}', [ConsultaController::class, 'meuPet'])->name('consultas.meuPet');
    Route::get('consultas/create/{petId}', [ConsultaController::class, 'create'])->name('consultas.create');

});

require __DIR__.'/auth.php';
