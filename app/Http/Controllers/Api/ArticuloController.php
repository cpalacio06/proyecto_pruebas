<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    // Mostrar todos los artículos
    public function index()
    {
        $articulos = Articulo::all();
        return response()->json($articulos);
    }

    // Mostrar un artículo por su ID
    public function show(Articulo $articulo)
    {
        return response()->json($articulo);
    }

    // Crear un artículo
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $articulo = new Articulo();
        $articulo->titulo = $validated['titulo'];
        $articulo->contenido = $validated['contenido'];
        $articulo->user_id = auth()->id();
        $articulo->save();

        return response()->json($articulo, 201);
    }

    // Actualizar un artículo
    public function update(Request $request, Articulo $articulo)
    {
        // Validación de los datos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $articulo->titulo = $validated['titulo'];
        $articulo->contenido = $validated['contenido'];
        $articulo->save();

        return response()->json($articulo);
    }

    // Eliminar un artículo
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return response()->json(null, 204);
    }
}

