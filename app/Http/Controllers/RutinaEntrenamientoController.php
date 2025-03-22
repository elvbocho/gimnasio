<?php

// app/Http/Controllers/RutinaEntrenamientoController.php

namespace App\Http\Controllers;

use App\Models\RutinaEntrenamiento;
use Illuminate\Http\Request;

class RutinaEntrenamientoController extends Controller
{
    public function index()
    {
        // Obtiene todas las rutinas de entrenamiento
        $rutinas = RutinaEntrenamiento::paginate(10);  // Aquí el número es cuántos elementos quieres por página.
    return view('rutinas-entrenamiento.index', compact('rutinas'));
    }

    public function create()
    {
        // Muestra el formulario para crear una nueva rutina de entrenamiento
        return view('rutinas-entrenamiento.create');
    }

    public function store(Request $request)
    {
        // Valida los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'nivel' => 'required|in:principiante,intermedio,avanzado',
        ]);

        // Crea una nueva rutina de entrenamiento
        RutinaEntrenamiento::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'nivel' => $request->nivel,
        ]);

        return redirect()->route('rutinas-entrenamiento.index')->with('success', 'Rutina creada correctamente');
    }

    public function show($id)
    {
        // Obtiene una rutina de entrenamiento específica por su ID
        $rutina = RutinaEntrenamiento::findOrFail($id);
        return view('rutinas-entrenamiento.show', compact('rutina'));
    }

    public function edit($id)
    {
        // Obtiene la rutina de entrenamiento por ID para editarla
        $rutina = RutinaEntrenamiento::findOrFail($id);
        return view('rutinas-entrenamiento.edit', compact('rutina'));
    }

    public function update(Request $request, $id)
    {
        // Valida los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'nivel' => 'required|in:principiante,intermedio,avanzado',
        ]);

        // Encuentra la rutina de entrenamiento por ID
        $rutina = RutinaEntrenamiento::findOrFail($id);
        $rutina->update($request->all());

        return redirect()->route('rutinas-entrenamiento.index')->with('success', 'Rutina actualizada correctamente');
    }

    public function destroy($id)
    {
        // Encuentra la rutina por ID y la elimina
        $rutina = RutinaEntrenamiento::findOrFail($id);
        $rutina->delete();

        return redirect()->route('rutinas-entrenamiento.index')->with('success', 'Rutina eliminada correctamente');
    }
}
