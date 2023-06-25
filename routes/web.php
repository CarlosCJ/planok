<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CotizarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
Route::get('/cotizaciones', [CotizarController::class, 'index'])->name('cotizaciones');
Route::get('/get-data/{id}', [CotizarController::class, 'getData'])->name('get-data');
Route::get('/verDetalle/{id}', [CotizarController::class, 'show'])->name('verDetalle');
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::get('/cant-productos', [ProductoController::class, 'getTotalDepartamentosVendidos'])->name('cantProductos');
