<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Autenticador;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(LoginController::class)->group(function() {
    Route::prefix('login')->group(function() {
        Route::get('/', 'index')->name('login');
        Route::post('/auth', 'auth')->name('auth');
        Route::get('/registry', 'registry')->name('registry');
        Route::post('/registry', 'register')->name('register');
    });
});

Route::redirect('/', '/series', 302);

Route::controller(SeriesController::class)->group(function() {
    Route::get('/series', 'index')->name('series.listar')->middleware(Autenticador::class);
    Route::get('/series/adicionar', 'create')->name('series.form-adicionar')->middleware(Autenticador::class);
    Route::post('/series/salvar-novo', 'storeNew')->name('series.salvar-novo')->middleware(Autenticador::class);
    Route::post('/series/editar', 'edit')->name('series.editar')->middleware(Autenticador::class);
    Route::post('/series/salvar-editado', 'storeEdited')->name('series.salvar-editado')->middleware(Autenticador::class);
    Route::delete('/series/remover/{serie}', 'destroy')->name('series.remover')->middleware(Autenticador::class);
});

Route::controller(SeasonsController::class)->group(function() {
    Route::get('/series/{serie}/seasons', 'index')->name('seasons.index')->middleware(Autenticador::class);
});

Route::controller(EpisodesController::class)->group(function() {
    Route::post('/series/season/{season}/episodes', 'index')->name('episodes.index')->middleware(Autenticador::class);
    Route::get('/series/season/{season}/episodes', 'index')->name('episodes.index-get')->middleware(Autenticador::class);
    Route::post('/series/season/episode/{episode}', 'check')->name('episodes.check')->middleware(Autenticador::class);
});