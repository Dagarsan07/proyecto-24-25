<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriaController extends Controller
{
    /**
     * Obtiene todas las categorías y las devuelve.
     * @return Inertia\Response Carga listado de categorias.
     */
    public function index() {
        $categorias = Categoria::all();
        Debugbar::debug($categorias);
        return Inertia::render('Categorias/Listado', ['categorias' => $categorias]);
    }

    /**
     * Carga el formulario de creación.
     */
    public function create() {
        return Inertia::render('Categorias/Formulario', ['categoria' => null]);
    }

    /**
     * Obtiene una categoría mediante su id y devuelve sus datos.
     * @param int $id
     */
    public function edit($id) {
        $categoria = Categoria::findOrFail($id);
        return Inertia::render('Categorias/Formulario', ['categoria' => $categoria]);
    }

    /**
     * Crea una nueva categoría.
     * @param Request $request
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'codigo' => 'required|string|max:10|unique:categorias',
            'nombre' => 'required|string|min:4|max:100'
        ]);

        $categoria = Categoria::create([
            'codigo' => $validated['codigo'],
            'nombre' => $validated['nombre']
        ]);

        return redirect()->route('categorias.index');
    }

    /**
     * Actualiza los datos de una categoría.
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id) {
        $categoria = Categoria::findOrFail($id);
        $validated = $request->validate([
            'codigo' => 'required|string|max:10',
            'nombre' => 'required|string|min:4|max:100'
        ]);

        $categoria->update([
            'codigo' => $validated['codigo'],
            'nombre' => $validated['nombre']
        ]);
        Debugbar::debug($categoria);
        return redirect()->route('categorias.index');
    }

    /**
     * Elimina la categoría.
     *
     * @param int $id
     */
    public function delete($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
