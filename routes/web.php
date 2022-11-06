<?php

use App\Http\Controllers\ConductorController;
use App\Http\Controllers\MapaController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::get('/usuarios',[ UserController::class,'index'])->middleware('auth')->name('usuarios');
Route::post('/usuarios/destroy',[ UserController::class,'destroy'])->middleware('auth');
Route::post('/usuarios/crear',[ UserController::class,'store'])->middleware('auth');
Route::post('/usuarios/update',[ UserController::class,'update'])->middleware('auth');
Route::get('/usuarios/getUsers',[ UserController::class,'getUsers']);

Route::get('/mapa',[MapaController::class,'index'])->middleware('auth')->name('mapa');

require __DIR__.'/auth.php';
