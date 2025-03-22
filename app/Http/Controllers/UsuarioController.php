<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::paginate(10); // Paginar en lugar de get()
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        // Validar los campos necesarios, incluyendo el campo numero
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'required|string|max:20',
            'direccion' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'contraseña' => 'required|string|min:8|confirmed',
            'numero' => 'nullable|string|max:20|unique:usuarios,numero',  // Validación para el campo numero
        ]);

        // Asignar numero manual o automático
        $numero = $validated['numero'] ?? $this->generarNumero();  // Si no hay numero, se genera automáticamente

        // Crear el usuario con todos los datos, incluyendo el numero
        $usuario = Usuario::create([
            'nombre' => $validated['nombre'],
            'apellido' => $validated['apellido'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'direccion' => $validated['direccion'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'fechainscripcion' => now(),  // Fecha de inscripción
            'contraseña' => bcrypt($validated['contraseña']),
            'estado' => 'activo',  // Por defecto
            'numero' => $numero,  // Asignamos el numero aquí
        ]);

        // Redirigir a la vista de usuarios con mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    // Mostrar el formulario para editar un usuario
    public function edit($id)
    {
        // Buscar el usuario por su ID
        $usuario = Usuario::findOrFail($id);
        
        // Retornar la vista con los datos del usuario
        return view('usuarios.edit', compact('usuario'));
    }

    // Mostrar un solo usuario
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
{
    $usuario = Usuario::findOrFail($id);

    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:usuarios,email,' . $usuario->id,
        'telefono' => 'required|string|max:15',
        'direccion' => 'nullable|string|max:255',
        'fecha_nacimiento' => 'nullable|date',
        'estado' => 'required|in:activo,inactivo',
        'numero' => 'nullable|string|max:50',
    ]);

    // Si no se proporciona un número, generar uno automáticamente
    if (empty($request->numero)) {
        $validatedData['numero'] = $this->generarNumero();  // Usar una función que genere el número
    }

    $usuario->update($validatedData);

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
}




    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }

    // Método para generar el número de usuario automáticamente
    protected function generarNumero()
    {
        // Genera un número único basado en el timestamp o cualquier lógica que prefieras
        return 'NUM' . strtoupper(uniqid());  // Genera un número único como 'NUM5f47f5c6bcbf3'
    }

    public function buscar(Request $request)
{
    // Buscar usuarios que coincidan con el término de búsqueda
    $usuarios = Usuario::where('nombre', 'like', '%' . $request->q . '%')->get();
    
    // Devolver los resultados en formato JSON
    return response()->json($usuarios);
}



}
