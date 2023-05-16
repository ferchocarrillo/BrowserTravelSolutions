<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClimaController;

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

Route::get('/', function () {
    return view('clima.index');
});

Route::resource('clima', ClimaController::class);

Route::get('/listado', [ClimaController::class, 'listado'])->name('listado');
Route::get('/search', [ClimaController::class, 'search'])->name('search');




