<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Obtiene todos los roles.
     * @return JsonResponse Respuesta JSON con la lista de roles.
     */
    public function index() {
        return response()->json(Rol::all());
    }
}
