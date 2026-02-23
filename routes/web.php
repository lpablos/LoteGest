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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.list');
    Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
    Route::post('guarda-corredor', [App\Http\Controllers\UserController::class, 'storeCorredor'])->name('usuario.corredor');
    Route::post('duplicar-lote', [App\Http\Controllers\LoteController::class, 'duplicado'])->name('duplicar.lote');
    Route::post('duplicar-lotfraccionamientoe', [App\Http\Controllers\FraccionamientoController::class, 'duplicado'])->name('duplicar.fraccionamiento');
    Route::get('cliente/contratos/{idCliente}', [App\Http\Controllers\ClienteController::class, 'verContrato'])->name('cliente.contratos');
    Route::resource('lote', App\Http\Controllers\LoteController::class);
    Route::resource('usuarios', App\Http\Controllers\UserController::class);
    Route::resource('perfiles', App\Http\Controllers\RoleController::class);
    Route::resource('cliente', App\Http\Controllers\ClienteController::class);
    Route::get('cliente-compra/{solicitudSys}', [App\Http\Controllers\ClienteController::class, 'continue'])->name('cliente.compra.continue');
    Route::get('cliente-nueva-compra/{idCliente}', [App\Http\Controllers\ClienteController::class, 'nuevaCompra'])->name('cliente.nueva.compra');
    Route::resource('estatus', App\Http\Controllers\CatEstatusController::class);
    Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
    Route::resource('contratos', App\Http\Controllers\ContratoController::class);
    Route::resource('municipios', App\Http\Controllers\CatMunicipioController::class);
    Route::resource('configuracion', App\Http\Controllers\ConfiguracionController::class);
    Route::resource('tipo-de-predios', App\Http\Controllers\CatTipoPredioController::class);
    Route::resource('fraccionamiento', App\Http\Controllers\FraccionamientoController::class);
    Route::get('fraccionamiento-detalle/{idFracc}', [App\Http\Controllers\FraccionamientoController::class, 'detFracc'])->name('fracc.detalle.registro');
    Route::get('manzanas-lotes/{idFracc}', [App\Http\Controllers\FraccionamientoController::class, 'fraccManzanaLote'])->name('fracc.Manzana.lote');
    Route::get('vientos-fraccionamientos/{idFracc}', [App\Http\Controllers\FraccionamientoController::class, 'vientosFraccionamiento'])->name('vientos.fraccion.identy');
    Route::resource('estatus-proyectos', App\Http\Controllers\CatEstatusProyectoController::class);
    Route::resource('entidades-federativas', App\Http\Controllers\CatEntidadFederativaController::class);
    Route::resource('estatus-disponibilidad', App\Http\Controllers\CatEstatusDisponibilidadController::class);
    Route::resource('compra-fraccionamiento-lotes', App\Http\Controllers\CompraController::class);
    // Route::resource('compras', App\Http\Controllers\CompraController::class);
    
    Route::get('vista-previa-contrato/{registro}', [App\Http\Controllers\DocumentosController::class, 'vistaPreviaContrato']);
    Route::get('vista-contrato/{registro}', [App\Http\Controllers\DocumentosController::class, 'contratoPDF']);
    Route::get('ver-documento/{id}', [App\Http\Controllers\DocumentosController::class, 'verDocumento'])->name('constrato.sistema.digital');

    //Contratos digitales
    Route::post('/contratos/generar', [App\Http\Controllers\ContratoController::class, 'contratoFirmado'])->name('contratos.upload.firmado');
    Route::get('/contratos/{id}/documento/firmado', [App\Http\Controllers\ContratoController::class,'obtenerDocumentoAsociado'])->name('contratos.documento.obtener.firmado');
});    






//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);



