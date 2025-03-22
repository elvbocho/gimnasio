<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function index()
    {
        // Obtiene todas las notificaciones paginadas, con los usuarios relacionados
        $notificaciones = Notificacion::with('usuario')->paginate(10); // Paginación de 10 por página
        
        // Retorna la vista 'notificaciones.index' y pasa los datos
        return view('notificaciones.index', compact('notificaciones'));
    }

    public function create()
    {
        // Obtener todos los usuarios
        $usuarios = Usuario::all();  // Asegúrate de importar el modelo Usuario

        // Muestra el formulario para crear una nueva notificación
        return view('notificaciones.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        // Valida los datos
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo' => 'required|in:pago,rutina,cumpleaños,promocion',
            'mensaje' => 'required|string',
            'estado' => 'required|in:enviado,pendiente',
        ]);

        // Crea una nueva notificación
        $notificacion = Notificacion::create([
            'usuario_id' => $request->usuario_id,
            'tipo' => $request->tipo,
            'mensaje' => $request->mensaje,
            'estado' => $request->estado,
            // Inicializamos 'entregada' en 'false' por defecto
            'entregada' => false,  
        ]);

        // Aquí podrías agregar el código para enviar la notificación (por ejemplo, correo, SMS, WhatsApp).
        // Después de enviar la notificación, actualizar el estado 'entregada' a true
        // Simulamos que la notificación ha sido entregada
        $notificacion->entregada = true;
        $notificacion->save();

        // Redirige a la lista de notificaciones con un mensaje de éxito
        return redirect()->route('notificaciones.index')->with('success', 'Notificación creada exitosamente');
    }

    public function show($id)
    {
        // Obtiene una notificación por ID con su usuario relacionado
        $notificacion = Notificacion::with('usuario')->findOrFail($id);

        // Retorna la vista 'notificaciones.show' con la notificación
        return view('notificaciones.show', compact('notificacion'));
    }

    public function edit($id)
    {
        // Obtiene la notificación a editar
        $notificacion = Notificacion::findOrFail($id);
        // Obtener todos los usuarios para el formulario de edición
        $usuarios = Usuario::all();

        // Retorna la vista 'notificaciones.edit' con la notificación y los usuarios
        return view('notificaciones.edit', compact('notificacion', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        // Valida los datos
        $request->validate([
            'estado' => 'required|in:enviado,pendiente',
        ]);

        // Encuentra la notificación por ID
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->update($request->all());

        // Si el estado es 'enviado', actualiza el campo 'entregada' a true
        if ($request->estado == 'enviado') {
            $notificacion->entregada = true;
            $notificacion->save();
        }

        // Redirige a la lista de notificaciones con un mensaje de éxito
        return redirect()->route('notificaciones.index')->with('success', 'Notificación actualizada exitosamente');
    }

    public function destroy($id)
    {
        // Encuentra la notificación por ID y la elimina
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->delete();

        // Redirige a la lista de notificaciones con un mensaje de éxito
        return redirect()->route('notificaciones.index')->with('success', 'Notificación eliminada exitosamente');
    }
}
