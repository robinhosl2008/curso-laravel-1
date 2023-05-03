<?php

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
    Route::post('/series/editar/{serie}', 'edit')->whereNumber('serie')->name('series.form-editar');
    Route::post('/series/salvar-editado', 'storeEdited')->name('series.salvar-editado');
    Route::delete('/series/remover/{serie}', 'destroy')->whereNumber('serie')->name('series.remover');
});

