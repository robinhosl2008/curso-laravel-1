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
    Route::get('/series/adicionar', 'create')->name('series.adicionar');
    Route::post('/series/salvar', 'store')->name('series.salvar');
});