<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
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

Route::redirect('/', '/series', 302);

Route::controller(SeriesController::class)->group(function() {
    Route::get('/series', 'index')->name('series.listar');
    Route::get('/series/adicionar', 'create')->name('series.form-adicionar');
    Route::post('/series/salvar-novo', 'storeNew')->name('series.salvar-novo');
    Route::post('/series/editar', 'edit')->name('series.editar');
    Route::post('/series/salvar-editado', 'storeEdited')->name('series.salvar-editado');
    Route::delete('/series/remover/{serie}', 'destroy')->name('series.remover');
});

Route::controller(SeasonsController::class)->group(function() {
    Route::get('/series/{serie}/seasons', 'index')->name('seasons.index');
});

Route::controller(EpisodesController::class)->group(function() {
    Route::post('/series/season/{season}/episodes', 'index')->name('episodes.index');
    Route::get('/series/season/{season}/episodes', 'index')->name('episodes.index-get');
    Route::post('/series/season/episode/{episode}', 'check')->name('episodes.check');
});