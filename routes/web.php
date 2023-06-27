<?php

use App\Http\Controllers\CampeonatosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\EnfrentamientosController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\PartidosController;
use App\Http\Controllers\PuntosController;
use App\Models\estadisticas;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::resource('equipos',EquiposController::class);
Route::resource('jugadores',JugadoresController::class);
Route::resource('partidos',PartidosController::class);
Route::resource('estadisticas',EstadisticasController::class);
Route::resource('puntos',PuntosController::class);
Route::resource('campeonatos',CampeonatosController::class);
Route::get('/equipos/create', [EquiposController::class, 'create'])->name('equipos.create');
Route::post('/equipos', [EquiposController::class, 'store'])->name('equipos.store');
Route::get('/jugadores/mas-puntos', 'JugadoresController@jugadorMasPuntos')->name('jugadores.mas-puntos');
Route::resource('enfrentamientos', EnfrentamientosController::class);
Route::get('/equipos/create', [EquiposController::class, 'create'])->name('equipos.create');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
