<?php
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\TipoVozController;
use App\Http\Controllers\EstilosVozController;
use App\Http\Controllers\RangoVocalController;
use App\Http\Controllers\TimbreVozController;
use App\Http\Controllers\AcentosDialectoController;
use App\Http\Controllers\RedesSocialeController;
use App\Http\Controllers\PanelHabilidadesController;
use App\Http\Controllers\PerfileController;
use App\Http\Controllers\PortafolioController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcomee');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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

Route::get('/panel-habilidades', [PanelHabilidadesController::class, 'index'])->name('panel-habilidades');


Route::resource('perfiles', PerfileController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/mi-portafolio', [PortafolioController::class, 'miPortafolio'])->name('mi-portafolio');
    Route::get('/mi-portafolio/create', [PortafolioController::class, 'create'])->name('mi-portafolio.create');
    Route::post('/mi-portafolio', [PortafolioController::class, 'store'])->name('mi-portafolio.store');

    Route::get('/mi-portafolio/edit', [PortafolioController::class, 'edit'])->name('mi-portafolio.edit');
    Route::put('/mi-portafolio', [PortafolioController::class, 'update'])->name('mi-portafolio.update');

});

Route::get('/portafolio/{id_perfil}', [PortafolioController::class, 'verPortafolio'])->name('portafolio.ver');
