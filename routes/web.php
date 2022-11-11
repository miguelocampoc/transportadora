<?php

use App\Http\Controllers\MapaController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\LeyController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PdfController;

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
   return  redirect('/login');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/usuarios/destroy',[UserController::class,'destroy'])->middleware('auth');
Route::post('/usuarios/crear',[UserController::class,'store'])->middleware('auth');
Route::post('/usuarios/update',[UserController::class,'update'])->middleware('auth');
Route::get('/usuarios/getUsers',[UserController::class,'getUsers']);
Route::get('/usuarios',[UserController::class,'index'])->middleware('auth')->name('usuarios');;

Route::get('/conductores',[ConductorController::class,'index'])->middleware('auth')->name('conductores');
Route::post('/conductores/destroy',[ConductorController::class,'destroy'])->middleware('auth');
Route::post('/conductores/crear',[ConductorController::class,'store'])->middleware('auth');
Route::post('/conductores/update',[ConductorController::class,'update'])->middleware('auth');
Route::get('/conductores/getConductor',[ConductorController::class,'getConductor']);

Route::get('/vehiculos',[VehiculoController::class,'index'])->middleware('auth')->name('vehiculos');
Route::post('/vehiculos/destroy',[VehiculoController::class,'destroy'])->middleware('auth');
Route::post('/vehiculos/crear',[VehiculoController::class,'store'])->middleware('auth');
Route::post('/vehiculos/update',[VehiculoController::class,'update'])->middleware('auth');
Route::get('/vehiculos/getVehiculo',[VehiculoController::class,'getVehiculo']);

Route::get('/ley',[LeyController::class,'index'])->middleware('auth')->name('ley');
Route::post('/ley/destroy',[LeyController::class,'destroy'])->middleware('auth');
Route::post('/ley/crear',[LeyController::class,'store'])->middleware('auth');
Route::get('/ley/getLey',[LeyController::class,'getLey']);

Route::get('/pdf/{id}', [PdfController::class, 'index']);

Route::get('/mapa',[MapaController::class,'index'])->middleware('auth')->name('mapa');

require __DIR__.'/auth.php';
