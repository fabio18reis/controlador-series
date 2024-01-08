<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Definir URL, Nome da Classe, e Método (NESTA ORDEM!)
Route::get('/series', [SeriesController::class, 'index'])->name('listar-series');
Route::get('/series/criar', [SeriesController::class, 'create'])->name('form-criar-serie');
Route::post('/series/criar', [SeriesController::class, 'store']);
Route::delete('/series/remover/{id}', [SeriesController::class, 'destroy']);


