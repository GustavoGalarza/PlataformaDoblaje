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
use App\Http\Controllers\PerfilIdiomaController;
use App\Http\Controllers\PerfilTipoVozController;
use App\Http\Controllers\PerfilEstilosVozController;
use App\Http\Controllers\PerfilRangoVocalController;
use App\Http\Controllers\PerfilTimbreVozController;
use App\Http\Controllers\PerfilAcentosDialectoController;
use App\Http\Controllers\PerfilRedesSocialesController;
use App\Http\Controllers\DemoController;






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

    //rutas de idiomas porfolio
    Route::get('/mi-portafolio/{perfil}/idiomas', [PerfilIdiomaController::class, 'edit'])->name('mi-portafolio.idiomas.edit');
    Route::post('/mi-portafolio/{perfil}/idiomas', [PerfilIdiomaController::class, 'update'])->name('mi-portafolio.idiomas.update');

    //rutas de tipo de voz porfolio
    Route::get('/mi-portafolio/tipos-voz/{perfil}/edit', [PerfilTipoVozController::class, 'edit'])->name('perfil-tipo-voz.edit');
    Route::put('/mi-portafolio/tipos-voz/{perfil}', [PerfilTipoVozController::class, 'update'])->name('perfil-tipo-voz.update');

    //rutas de estilos de voz porfolio
    Route::get('mi-portafolio/estilos-voz/{perfil}/edit', [PerfilEstilosVozController::class, 'edit'])->name('perfil-estilos-voz.edit');
    Route::post('mi-portafolio/estilos-voz/{perfil}', [PerfilEstilosVozController::class, 'update'])->name('perfil-estilos-voz.update');

    //rutas de rango vocal porfolio
    Route::get('mi-portafolio/rangos-vocales/{perfil}/edit', [PerfilRangoVocalController::class, 'edit'])->name('perfil-rango-vocal.edit');
    Route::post('mi-portafolio/rangos-vocales/{perfil}', [PerfilRangoVocalController::class, 'update'])->name('perfil-rango-vocal.update');

    // Rutas de timbre de voz en portafolio
    Route::get('mi-portafolio/timbres-voz/{perfil}/edit', [PerfilTimbreVozController::class, 'edit'])->name('perfil-timbre-voz.edit');
    Route::post('mi-portafolio/timbres-voz/{perfil}', [PerfilTimbreVozController::class, 'update'])->name('perfil-timbre-voz.update');

    //rutas de acentos y dialectos en porfolio
    Route::get('mi-portafolio/acentos-dialectos/{perfil}/edit', [PerfilAcentosDialectoController::class, 'edit'])->name('perfil-acento-dialecto.edit');
    Route::post('mi-portafolio/acentos-dialectos/{perfil}', [PerfilAcentosDialectoController::class, 'update'])->name('perfil-acento-dialecto.update');

    //rutas de redes sociales para acentos en portafolio
    Route::get('mi-portafolio/redes-sociales/{perfil}/edit', [PerfilRedesSocialesController::class, 'edit'])
        ->name('perfil-redes-sociales.edit');
    Route::post('mi-portafolio/redes-sociales/{perfil}', [PerfilRedesSocialesController::class, 'update'])
        ->name('perfil-redes-sociales.update');

    //rutas de DEMOS para el perfil portafolio
    Route::get('/mi-portafolio/demos/create', [DemoController::class, 'create'])->name('demos.create');
    Route::post('/mi-portafolio/demos', [DemoController::class, 'store'])->name('demos.store');

});

Route::get('/portafolio/{id_perfil}', [PortafolioController::class, 'verPortafolio'])->name('portafolio.ver');
