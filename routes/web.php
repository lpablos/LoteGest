<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root')->middleware('auth');

// customers route
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.list');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


// Route::prefix('gestion-proyectos')->group(function () {
//      Route::controller(ProyectoController::class)->group(function () {
//             Route::get('/', 'index')->name('gestion.proyecto.index');
//             Route::get('formulario-proyecto', 'create')->name('gestion.proyecto.create');
//      });
// });

Route::post('guarda-corredor', [App\Http\Controllers\UserController::class, 'storeCorredor'])->name('usuario.corredor');
Route::resource('lote', App\Http\Controllers\LoteController::class);
Route::resource('usuarios', App\Http\Controllers\UserController::class);
Route::resource('perfiles', App\Http\Controllers\RoleController::class);
Route::resource('cliente', App\Http\Controllers\ClienteController::class);
Route::resource('estatus', App\Http\Controllers\CatEstatusController::class);
Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
Route::resource('configuracion', App\Http\Controllers\ConfiguracionController::class);
Route::resource('tipo-de-predios', App\Http\Controllers\CatTipoPredioController::class);
Route::resource('fraccionamiento', App\Http\Controllers\FraccionamientoController::class);
Route::resource('estatus-proyectos', App\Http\Controllers\CatEstatusProyectoController::class);
Route::resource('estatus-disponibilidad', App\Http\Controllers\CatEstatusDisponibilidadController::class);


//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);



