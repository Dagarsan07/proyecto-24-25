<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PreguntaController;
use Illuminate\Support\Facades\Route;

/** CategoriaController - Init */
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::post('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::get('/categorias/{id}', [CategoriaController::class, 'delete'])->name('categorias.delete');
/** CategoriaController - End */

/** PreguntaController - Init */
Route::get('/preguntas', [PreguntaController::class, 'index'])->name('preguntas.index');
Route::post('/preguntas', [PreguntaController::class, 'store'])->name('preguntas.store');
Route::get('/preguntas/{id}', [PreguntaController::class, 'show'])->name('preguntas.show');
Route::post('/preguntas/{id}', [PreguntaController::class, 'update'])->name('preguntas.update');
Route::get('/preguntas/{id}', [PreguntaController::class, 'delete'])->name('preguntas.delete');
/** PreguntaController - End */