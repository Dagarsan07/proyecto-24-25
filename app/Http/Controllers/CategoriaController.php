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
     * @return JsonResponse Respuesta JSON con la lista de categorías.
     */
    public function index() {
        $categorias = Categoria::all();
        Debugbar::debug($categorias);
        return Inertia::render('Categorias/Listado', ['categorias' => $categorias]);
    }

    /**
     * Obtiene una categoría mediante su id y devuelve sus datos.
     * @param int $id
     * @return JsonResponse Respuesta JSON con la categoría.
     */
    public function show($id) {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria);
    }

    /**
     * Crea una nueva categoría.
     * @param Request $request
     * @return JsonResponse Respuesta JSON con mensaje y código de estado.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'codigo' => 'required|string|max:10|unique:categorias',
            'nombre' => 'required|string|min:4|max:30',
            'descripcion' => 'string|max:300|min:10'
        ]);

        Categoria::create([
            'codigo' => $validated['codigo'],
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion']
        ]);

        return response()->json(
            ['message' => 'La categoria se ha creado correctamente.'], 201
        );
    }

    /**
     * Actualiza los datos de una categoría.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id) {
        $categoria = Categoria::findOrFail($id);

        $validated = $request->validate([
            'codigo' => 'required|string|max:10|unique:categorias',
            'nombre' => 'required|string|min:4|max:30',
            'descripcion' => 'string|max:300|min:10'
        ]);

        $categoria->update($validated);
        return response()->json($categoria);
    }

    /**
     * Elimina la categoría.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json([
            'message' => 'Categoría eliminada correctamente. También se han borrado las preguntas y sus respectivas respuestas asociadas a esta.'
        ]);
    }
}
