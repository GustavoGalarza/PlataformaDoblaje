<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoticiaController;


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



