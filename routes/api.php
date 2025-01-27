<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PreguntaController;
use Illuminate\Support\Facades\Route;

/** CategoriaController - Init */
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::post('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'delete'])->name('categorias.delete');
/** CategoriaController - End */

/** PreguntaController - Init */
Route::get('/categorias/{id}/preguntas', [PreguntaController::class, 'filterByCategoriaId'])->name('preguntas.index');
Route::get('/categorias/{id}/preguntas/create', [PreguntaController::class, 'create'])->name('preguntas.create');
Route::post('/categorias/{id}/preguntas', [PreguntaController::class, 'store'])->name('preguntas.store');
Route::get('/categorias/{idC}/preguntas/{idP}/edit', [PreguntaController::class, 'edit'])->name('preguntas.edit');
Route::post('/categorias/{idC}/preguntas/{idP}', [PreguntaController::class, 'update'])->name('preguntas.update');
Route::delete('/categorias/{idC}/preguntas/{idP}', [PreguntaController::class, 'delete'])->name('preguntas.delete');
/** PreguntaController - End */