<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartidaResource;
use App\Models\Categoria;
use App\Models\Partida;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PartidaController extends Controller
{
    public function index() {
        $categoria = session('categoria');
        $preguntas = session('preguntas');

        if (!$categoria || !$preguntas) {
            return redirect()->route('categorias.seleccionar')->with('error', 'Seleccione una categoría para comenzar.');
        }

        return Inertia::render('Partida/Partida', [
            'categoria' => $categoria,
            'preguntas' => $preguntas
        ]);
    }

    public function seleccionarCategoria() {
        $categorias = Categoria::all();
        return Inertia::render('Partida/SeleccionarCategoria', [
            'categorias' => $categorias
        ]);
    }

    public function iniciarPartida(Request $request) {
        $validated = $request->validate([
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $preguntas = Pregunta::where('id_categoria', $validated['categoria_id'])
            ->with('respuestas')
            ->inRandomOrder()
            ->take(10)
            ->get();

        session([
            'categoria' => Categoria::find($validated['categoria_id']),
            'preguntas' => $preguntas
        ]);

        return redirect()->route('partida');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_categoria' => 'required|exists:categorias,id',
            'puntuacion' => 'required',
            'tiempo' => 'required'
        ]);

        Partida::insert([
            'id_user' => $validated['id_user'],
            'id_categoria' => $validated['id_categoria'],
            'puntuacion' => $validated['puntuacion'],
            'tiempo' => $validated['tiempo'],
        ]);

        return redirect()->route('inicio');
    }

    public function rankingGlobal(Request $request) {
        $query = Partida::with(['categoria', 'user'])
            ->select('id', 'id_categoria', 'id_user', 'puntuacion', 'tiempo');

        if ($request->filled('categoria_id')) {
            $query->where('id_categoria', $request->input('categoria_id'));
        }

        if ($request->filled('solo_mias') && Auth::check()) {
            $query->where('id_user', Auth::id());
        }

        $ranking = PartidaResource::collection(
            $query->orderByDesc('puntuacion')
                ->orderBy('tiempo')
                ->paginate(10)
        );

        $categorias = Categoria::select('id', 'nombre')->get();

        return Inertia::render('Clasificacion', [
            'ranking' => $ranking,
            'categorias' => $categorias,
            'filtros' => [
                'categoria_id' => $request->input('categoria_id'),
                'solo_mias' => $request->boolean('solo_mias')
            ]
        ]);
    }
}
