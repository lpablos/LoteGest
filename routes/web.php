<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
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


Route::resource('proyectos', ProyectoController::class);
Route::get('proyecto/{proyecto}/fraccionamientos', [ProyectoController::class, 'fraccionamientos'])->name('proyecto.fraccionamientos');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);



