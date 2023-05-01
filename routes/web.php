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
Route::prefix('series')->group(function() {
    Route::get('/', [SeriesController::class, 'index'])->name('series-lista');
    Route::get('/adicionar', [SeriesController::class, 'create'])->name('series-criar');
    Route::post('/salvar', [SeriesController::class, 'store'])->name('series-salvar');
});