<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Obtiene todas las preguntas y las devuelve.
     * @return JsonResponse Respuesta JSON con la lista de preguntas.
     */
    public function index() {
        return response()->json(Pregunta::all());
    }

    /**
     * Obtiene una pregunta mediante su id y devuelve sus datos.
     * @param int $id
     * @return JsonResponse Respuesta JSON con la pregunta.
     */
    public function show($id) {
        $pregunta = Pregunta::findOrFail($id);
        return response()->json($pregunta);
    }

    /**
     * Crea una nueva pregunta.
     * @param Request $request
     * @return JsonResponse Respuesta JSON con mensaje y código de estado.
     */
    public function store(Request $request) {
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
     * @param string $codigo
     * @return JsonResponse Respuesta JSON con la lista de categorías.
     */
    public function filterByCategoriaCodigo($codigo) {
        $categoria = Categoria::where('codigo', $codigo)->first();

        if (!$categoria) {
            return response()->json(['message' => 'No existe la categoría indicada', 404]);
        }

        $preguntas = $categoria->preguntas;
        return response()->json($preguntas);
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
