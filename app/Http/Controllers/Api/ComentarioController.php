<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    // Crear un comentario
    public function store(Request $request, Articulo $articulo)
    {
        // Validación de los datos
        $validated = $request->validate([
            'contenido' => 'required|string',
        ]);

        $comentario = new Comentario();
        $comentario->contenido = $validated['contenido'];
        $comentario->articulo_id = $articulo->id;
        $comentario->user_id = auth()->id();
        $comentario->save();

        return response()->json($comentario, 201);
    }

    // Eliminar un comentario
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return response()->json(null, 204);
    }
}

