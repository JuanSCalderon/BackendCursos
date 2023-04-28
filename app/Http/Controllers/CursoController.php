<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $cursos = Curso::all();
    return response()->json(['data' => $cursos], 200);
}

public function store(Request $request)
{
    $this->validate($request, [
        'nombre' => 'required',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
    ]);

    $curso = Curso::create($request->all());
    return response()->json(['data' => $curso], 201);
}

public function show($id)
{
    $curso = Curso::find($id);

    if (!$curso) {
        return response()->json(['error' => 'Curso no encontrado'], 404);
    }

    return response()->json(['data' => $curso], 200);
}

public function update(Request $request, $id)
{
    $this->validate($request, [
        'nombre' => 'required',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
    ]);

    $curso = Curso::find($id);

    if (!$curso) {
        return response()->json(['error' => 'Curso no encontrado'], 404);
    }

    $curso->update($request->all());
    return response()->json(['data' => $curso], 200);
}

public function destroy($id)
{
    $curso = Curso::find($id);

    if (!$curso) {
        return response()->json(['error' => 'Curso no encontrado'], 404);
    }

    $curso->delete();
    return response()->json(['message' => 'Curso eliminado con éxito'], 200);
}

}
