<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Pregunta;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PreguntaController extends Controller
{
    /**
     * Obtiene todas las preguntas y las devuelve.
     * @return JsonResponse Respuesta JSON con la lista de preguntas.
     */
    // public function index($id) {
    //     return response()->json(Pregunta::all());
    // }

    /**
     * Obtiene una pregunta mediante su id y devuelve sus datos.
     * @param int $id
     * @return JsonResponse Respuesta JSON con la pregunta.
     */
    public function create($id) {
        return Inertia::render('Preguntas/Formulario', ['pregunta' => null, 'categoria_id' => $id]);
    }

    public function edit($idC, $idP) {
        $pregunta = Pregunta::findOrFail($idP);
        return Inertia::render('Preguntas/Formulario', ['pregunta' => $pregunta, 'categoria_id' => $idP]);
    }

    /**
     * Crea una nueva pregunta.
     * @param Request $request
     * @return JsonResponse Respuesta JSON con mensaje y código de estado.
     */
    public function store(Request $request, $id) {
        $validated = $request->validate([
            'id_categoria' => 'required',
            'texto' => 'required|string|max:200|min:30',
            'tipo' => 'required|'
        ]);

        Pregunta::create([
            'id_categoria' => $validated['id_categoria'],
            'texto' => $validated['texto'],
            'tipo' => $validated['tipo']
        ]);

        return response()->json(
            ['message' => 'La pregunta se ha agregado correctamente.', 201]
        );
    }

    /**
     * Devuelve las preguntas de la categoria especificada.
     * @param string $id
     * @return JsonResponse Respuesta JSON con la lista de categorías.
     */
    public function filterByCategoriaId($id) {
        $categoria = Categoria::findOrFail($id);

        if (!$categoria) {
            return response()->json(['message' => 'No existe la categoría indicada', 404]);
        }
        $preguntas = DB::table('preguntas')->where('id_categoria', $id)->get();
        Debugbar::debug($preguntas);
        return Inertia::render('Preguntas/Listado', ['categoria_id' => $id, 'preguntas' => $preguntas]);
    }

    /**
     * Elimina la pregunta.
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id) {
        $pregunta = Pregunta::findOrFail($id);
        $pregunta->delete();
        return response()->json([
            'message' => 'Pregunta eliminada correctamente. También se han eliminado las respuestas asociadas.'
        ]);
    }
}
