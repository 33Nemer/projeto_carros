<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AluguelController;

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
Route::resource('carros', CarrosController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('alugueis', AluguelController::class);

Route::get('/', function () {
    return view('bem-vindo');
});

Route::get('/alugueis', [AluguelController::class, 'index'])->name('alugueis.index');

// Formulário de criação de aluguel
Route::get('/alugueis/create', [AluguelController::class, 'create'])->name('alugueis.create');

// Salvar o novo aluguel (POST)
Route::post('/alugueis', [AluguelController::class, 'store'])->name('alugueis.store');