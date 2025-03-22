<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MembresiaController extends Controller
{
    public function index()
    {
        // Obtiene todas las membresías con la relación de los usuarios cargada para mostrar los detalles completos
        $membresias = Membresia::with('usuario')->get();
        
        // Retorna la vista pasando las membresías
        return view('membresias.index', compact('membresias'));
    }

    public function create()
    {
        // Obtiene todos los usuarios para el formulario de creación de membresía
        $usuarios = Usuario::all();
        
        // Retorna la vista de creación de membresía
        return view('membresias.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        // Valida los datos
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo' => 'required|in:mensual,trimestral,anual',
            'precio' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date', // no es necesario enviar la fecha_fin en el formulario si se va a calcular
        ]);
    
        // Calcula la fecha de fin según el tipo de membresía
        $fechaInicio = Carbon::parse($request->fecha_inicio);
        switch ($request->tipo) {
            case 'mensual':
                $fechaFin = $fechaInicio->addMonth();
                break;
            case 'trimestral':
                $fechaFin = $fechaInicio->addMonths(3);
                break;
            case 'anual':
                $fechaFin = $fechaInicio->addYear();
                break;
            default:
                $fechaFin = $fechaInicio; // Si no es un tipo válido, solo se asigna la fecha de inicio
                break;
        }
    
        // Determina el estado de la membresía
        $estadoMembresia = Carbon::now()->greaterThan($fechaFin) ? 'Expirada' : 'Activa';
    
        // Crea una nueva membresía
        Membresia::create([
            'usuario_id' => $request->usuario_id,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $fechaFin,
            'estadoMembresia' => $estadoMembresia,  // Asignar el estado
        ]);
    
        return redirect()->route('membresias.index')->with('success', 'Membresía creada correctamente');
    }
    

    public function show($id)
    {
        // Obtiene la membresía por su ID con los datos del usuario
        $membresia = Membresia::with('usuario')->findOrFail($id);
        
        // Muestra los detalles de la membresía
        return view('membresias.show', compact('membresia'));
    }

    public function edit($id)
    {
        // Obtiene la membresía y los usuarios para el formulario de edición
        $membresia = Membresia::findOrFail($id);
        $usuarios = Usuario::all();
        
        // Muestra la vista de edición
        return view('membresias.edit', compact('membresia', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        // Valida los datos del formulario de edición
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo' => 'required|in:mensual,trimestral,anual',
            'precio' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);
    
        // Encuentra la membresía por ID y la actualiza
        $membresia = Membresia::findOrFail($id);
    
        // Calculamos la fecha de vencimiento nuevamente
        $fechaInicio = Carbon::parse($request->fecha_inicio);
        switch ($request->tipo) {
            case 'mensual':
                $fechaFin = $fechaInicio->addMonth();
                break;
            case 'trimestral':
                $fechaFin = $fechaInicio->addMonths(3);
                break;
            case 'anual':
                $fechaFin = $fechaInicio->addYear();
                break;
            default:
                $fechaFin = $fechaInicio; // Si no es un tipo válido, solo se asigna la fecha de inicio
                break;
        }
    
        // Determina el estado de la membresía
        $estadoMembresia = Carbon::now()->greaterThan($fechaFin) ? 'Expirada' : 'Activa';
    
        // Actualiza la membresía con las nuevas fechas y datos
        $membresia->update([
            'usuario_id' => $request->usuario_id,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $fechaFin,
            'estadoMembresia' => $estadoMembresia,  // Asignar el estado
        ]);
    
        // Redirige al listado de membresías con un mensaje de éxito
        return redirect()->route('membresias.index')->with('success', 'Membresía actualizada correctamente');
    }
    
    public function destroy($id)
    {
        // Encuentra la membresía por ID y la elimina
        $membresia = Membresia::findOrFail($id);
        $membresia->delete();

        // Redirige al listado de membresías con un mensaje de éxito
        return redirect()->route('membresias.index')->with('success', 'Membresía eliminada correctamente');
    }
}
