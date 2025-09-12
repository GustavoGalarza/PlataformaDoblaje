<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\TipoVozController;
use App\Http\Controllers\EstilosVozController;
use App\Http\Controllers\RangoVocalController;
use App\Http\Controllers\TimbreVozController;
use App\Http\Controllers\AcentosDialectoController;
use App\Http\Controllers\RedesSocialeController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcomee');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('productos', ProductoController::class);
Route::resource('categoria', CategoriumController::class);
Route::resource('users', UserController::class);

Route::resource('noticias', NoticiaController::class);
Route::get('/panel-noticias', [NoticiaController::class, 'panel'])->name('panel-noticias');

Route::resource('idiomas', IdiomaController::class);
Route::resource('tipo-vozs', TipoVozController::class);
Route::resource('estilos-vozs', EstilosVozController::class);
Route::resource('rango-vocals', RangoVocalController::class);
Route::resource('timbre-vozs', TimbreVozController::class);
Route::resource('acentos-dialectos', AcentosDialectoController::class);
Route::resource('redes-sociales', RedesSocialeController::class);

