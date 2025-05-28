<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\FraccionamientoController;
use App\Http\Controllers\LoteController;
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


Route::resource('usuarios', App\Http\Controllers\UserController::class);
Route::resource('proyectos', ProyectoController::class);
Route::get('proyecto/{proyecto}/fraccionamientos', [ProyectoController::class, 'fraccionamientos'])->name('proyecto.fraccionamientos');//Listdo de fraccionamientos
Route::resource('fraccionamiento', FraccionamientoController::class);
Route::get('proyecto-fraccionamiento/{proyecto}/create', [FraccionamientoController::class, 'createFraccionamiento'])->name('proyecto.fraccionamientos.create');
Route::get('proyecto-fraccionamiento/{fraccionamiento}/lote', [FraccionamientoController::class, 'lotes'])->name('proyecto.fraccionamientos.lotes'); // listado de lotes
Route::resource('lote', LoteController::class);
Route::get('fraccionamiento-lote/{fraccionamiento}/create', [LoteController::class, 'createLote'])->name('fraccionamiento.lote.create');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);



