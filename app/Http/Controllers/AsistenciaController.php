<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AsistenciaController extends Controller
{
    public function index(Request $request)
    {
        // Obtener la fecha de corte (últimas 24 horas)
        $fechaCorte = now()->subDay();
    
        // Obtener asistencias de las últimas 24 horas
        $asistencias = Asistencia::with('usuario')->where('fecha_hora', '>=', $fechaCorte);
    
        // Filtros opcionales por fecha, usuario o método de registro
        if ($request->has('fecha')) {
            $asistencias = $asistencias->whereDate('fecha_hora', $request->fecha);
        }
    
        if ($request->has('usuario_id')) {
            $asistencias = $asistencias->where('usuario_id', $request->usuario_id);
        }
    
        if ($request->has('metodo_registro')) {
            $asistencias = $asistencias->where('metodo_registro', $request->metodo_registro);
        }
    
        // Paginar los resultados
        $asistencias = $asistencias->orderByDesc('fecha_hora')->paginate(10);
        $usuarios = Usuario::all();
    
        return view('asistencias.index', compact('asistencias', 'usuarios'));
    }

    public function showRegistroForm()
    {
        return view('asistencias.registro');
    }

    public function registrarAsistencia(Request $request)
{
    $request->validate([
        'numero' => 'nullable|exists:usuarios,numero',
        'nombre' => 'nullable|required_if:numero,null|string',
        'apellido' => 'nullable|required_if:numero,null|string',
        'contraseña' => 'nullable|required_if:numero,null|string'
    ]);

    // Buscar usuario por número de socio
    if ($request->filled('numero')) {
        $usuario = Usuario::where('numero', $request->numero)->first();

        if (!$usuario) {
            return back()->withErrors(['mensaje' => 'Número de socio no válido']);
        }

        // Verificar si la membresía está vencida
        $membresia = $usuario->membresia;  // Obtener la membresía relacionada

        if ($membresia) {
            // Aseguramos que la fecha de fin de la membresía sea una instancia de Carbon
            $fechaFinMembresia = Carbon::parse($membresia->fecha_fin);
            
            // Verificamos si la fecha de vencimiento es antes de ahora
            if ($fechaFinMembresia->isBefore(now())) {
                return back()->withErrors(['mensaje' => 'Tu membresía está vencida. Renueva antes de registrar asistencia.']);
            }
        }

        // Registrar asistencia
        Asistencia::create([
            'usuario_id' => $usuario->id,
            'fecha_hora' => now(),
            'metodo_registro' => 'numero',
        ]);

        return redirect()->back()->with('success', 'Asistencia registrada correctamente por número de socio. Bienvenido ' . $usuario->nombre);
    }

    // Buscar usuario por nombre y apellido
    $usuario = Usuario::where('nombre', $request->nombre)
                      ->where('apellido', $request->apellido)
                      ->first();

    if (!$usuario) {
        return back()->withErrors(['mensaje' => 'Usuario no encontrado']);
    }

    // Verificar si la contraseña es correcta
    if (!Hash::check($request->contraseña, $usuario->contraseña)) {
        return back()->withErrors(['mensaje' => 'Credenciales incorrectas']);
    }

    // Verificar si la membresía está vencida
    $membresia = $usuario->membresia;  // Obtener la membresía relacionada
    if ($membresia) {
        // Aseguramos que la fecha de fin de la membresía sea una instancia de Carbon
        $fechaFinMembresia = Carbon::parse($membresia->fecha_fin);
        
        // Verificamos si la fecha de vencimiento es antes de ahora
        if ($fechaFinMembresia->isBefore(now())) {
            return back()->withErrors(['mensaje' => 'Tu membresía está vencida. Renueva antes de registrar asistencia.']);
        }
    }

    // Registrar asistencia
    Asistencia::create([
        'usuario_id' => $usuario->id,
        'fecha_hora' => now(),
        'metodo_registro' => 'manual',
    ]);

    return redirect()->back()->with('success', 'Asistencia registrada correctamente. Bienvenido ' . $usuario->nombre);
}


    public function show($id)
    {
        $asistencia = Asistencia::with('usuario')->findOrFail($id);
        return view('asistencias.show', compact('asistencia'));
    }

    public function edit($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $usuarios = Usuario::all();
        return view('asistencias.edit', compact('asistencia', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'metodo_registro' => 'required|in:numero,manual',
        ]);

        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente');
    }

    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();

        return redirect()->route('asistencias.index')->with('success', 'Asistencia eliminada correctamente');
    }

    public function clear()
    {
        session(['clear_asistencias' => true]);
        return redirect()->route('asistencias.index')->with('success', 'Lista de asistencias limpiada temporalmente.');
    }
    
    public function restore()
    {
        session()->forget('clear_asistencias');
        return redirect()->route('asistencias.index')->with('success', 'Lista de asistencias restaurada.');
    }
}
