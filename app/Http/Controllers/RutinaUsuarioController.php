<?php

namespace App\Http\Controllers;

use App\Models\RutinaUsuario;
use App\Models\Usuario;
use App\Models\RutinaEntrenamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class RutinaUsuarioController extends Controller
{
    public function index()
    {
        // Obtiene las rutinas asignadas a los usuarios
        $rutinasUsuarios = RutinaUsuario::with(['usuario', 'rutina'])->get();
        return view('rutinas-usuarios.index', compact('rutinasUsuarios'));
    }

    public function create()
    {
        // Obtiene los usuarios y las rutinas disponibles para asignar
        $usuarios = Usuario::all();
        $rutinas = RutinaEntrenamiento::all();
        return view('rutinas-usuarios.create', compact('usuarios', 'rutinas'));
    }

    public function store(Request $request)
    {
        // Valida los campos de entrada
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'rutina_id' => 'required|exists:rutinas_entrenamiento,id',
            'estado' => 'required|in:enviado,pendiente',
        ]);

        // Crear la relación entre usuario y rutina
        $rutinaUsuario = RutinaUsuario::create([
            'usuario_id' => $request->usuario_id,
            'rutina_id' => $request->rutina_id,
            'estado' => $request->estado,
        ]);

        // Si se ha marcado la opción de enviar por WhatsApp
        if ($request->has('enviar_whatsapp') && $request->enviar_whatsapp == 1) {
            // Obtener el usuario y el número de teléfono
            $usuario = Usuario::find($request->usuario_id);
            $telefono = $usuario->telefono;
            
            // Verificar si el usuario tiene número de teléfono
            if (!$telefono) {
                return redirect()->route('rutinas-usuarios.index')
                    ->with('warning', 'Rutina asignada correctamente, pero no se pudo enviar por WhatsApp: el usuario no tiene teléfono registrado');
            }
            
            // Obtener la rutina asignada
            $rutina = RutinaEntrenamiento::find($request->rutina_id);
            
            // Preparar el mensaje
            $mensaje = $this->prepararMensajeWhatsApp($usuario, $rutina, $request);
            
            try {
                // Enviar el mensaje de WhatsApp usando Twilio
                $enviado = $this->enviarMensajeWhatsApp($telefono, $mensaje);
                
                // Actualizar el estado a enviado si fue exitoso
                if ($enviado && $rutinaUsuario->estado !== 'enviado') {
                    $rutinaUsuario->update(['estado' => 'enviado']);
                }
                
                return redirect()->route('rutinas-usuarios.index')
                    ->with('success', 'Rutina asignada correctamente y enviada por WhatsApp');
            } catch (\Exception $e) {
                Log::error("Error al enviar mensaje de WhatsApp: " . $e->getMessage());
                return redirect()->route('rutinas-usuarios.index')
                    ->with('error', 'Rutina asignada correctamente, pero hubo un problema al enviar por WhatsApp: ' . $e->getMessage());
            }
        }

        // Redirigir a la vista de índice de rutinas con mensaje de éxito
        return redirect()->route('rutinas-usuarios.index')
            ->with('success', 'Rutina asignada correctamente');
    }

    /**
     * Prepara el mensaje personalizado para WhatsApp
     */
    private function prepararMensajeWhatsApp($usuario, $rutina, $request)
    {
        // Si hay un mensaje personalizado, lo usamos; de lo contrario, usamos el mensaje predeterminado
        if ($request->has('mensaje_personalizado') && !empty($request->mensaje_personalizado)) {
            $mensaje = $request->mensaje_personalizado;
            
            // Reemplazar las etiquetas por los valores reales
            $mensaje = str_replace('{nombre}', $usuario->nombre, $mensaje);
            $mensaje = str_replace('{rutina}', $rutina->nombre, $mensaje);
        } else {
            // Mensaje predeterminado
            $mensaje = "Hola {$usuario->nombre}, esta es tu rutina de hoy: {$rutina->nombre}. ¡Disfruta tu entrenamiento!";
        }
        
        // Si se ha seleccionado incluir detalles completos
        if ($request->has('incluir_detalles') && $request->incluir_detalles == 1) {
            $mensaje .= "\n\n*Detalles de la rutina:*\n";
            $mensaje .= "- *Descripción:* " . ($rutina->descripcion ?? 'No disponible') . "\n";
            $mensaje .= "- *Duración:* " . ($rutina->duracion ?? 'No especificada') . "\n";
            $mensaje .= "- *Nivel:* " . ($rutina->nivel ?? 'No especificado') . "\n";
            
            // Si hay ejercicios asociados a la rutina, los incluimos
            if (method_exists($rutina, 'ejercicios') && $rutina->ejercicios()->count() > 0) {
                $mensaje .= "\n*Ejercicios:*\n";
                
                foreach ($rutina->ejercicios as $index => $ejercicio) {
                    $mensaje .= ($index + 1) . ". *{$ejercicio->nombre}*\n";
                    $mensaje .= "   Series: {$ejercicio->series} | Repeticiones: {$ejercicio->repeticiones}\n";
                    if (!empty($ejercicio->descripcion)) {
                        $mensaje .= "   {$ejercicio->descripcion}\n";
                    }
                    $mensaje .= "\n";
                }
            }
        }
        
        return $mensaje;
    }

    public function show($id)
    {
        // Muestra los detalles de una rutina asignada a un usuario específico
        $rutinaUsuario = RutinaUsuario::with(['usuario', 'rutina'])->findOrFail($id);
        return view('rutinas-usuarios.show', compact('rutinaUsuario'));
    }

    public function edit($id)
    {
        // Muestra el formulario para editar la rutina asignada
        $rutinaUsuario = RutinaUsuario::findOrFail($id);
        $usuarios = Usuario::all();
        $rutinas = RutinaEntrenamiento::all();
        return view('rutinas-usuarios.edit', compact('rutinaUsuario', 'usuarios', 'rutinas'));
    }

    public function update(Request $request, $id)
    {
        // Valida y actualiza la rutina asignada
        $request->validate([
            'estado' => 'required|in:enviado,pendiente',
        ]);

        $rutinaUsuario = RutinaUsuario::findOrFail($id);
        $rutinaUsuario->update($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->route('rutinas-usuarios.index')
            ->with('success', 'Rutina actualizada correctamente');
    }

    public function destroy($id)
    {
        // Eliminar una rutina asignada a un usuario
        $rutinaUsuario = RutinaUsuario::findOrFail($id);
        $rutinaUsuario->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('rutinas-usuarios.index')
            ->with('success', 'Rutina eliminada correctamente');
    }

    /**
     * Envía un mensaje de WhatsApp utilizando Twilio
     */
    private function enviarMensajeWhatsApp($telefono, $mensaje)
    {
        try {
            // Tus credenciales de Twilio (deberías almacenarlas en el archivo .env)
            $sid = env('TWILIO_SID');
            $token = env('TWILIO_TOKEN');
            $twilioWhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER'); // Formato: whatsapp:+14155238886
            
            // Asegurarse de que el número tenga el formato correcto
            $telefono = preg_replace('/[^0-9]/', '', $telefono);
            
            // Verificar si el número incluye código de país, si no, agregar el código de país
            if (strlen($telefono) <= 9) {
                $telefono = '34' . $telefono; // Código de España, modifica según tu país
            }
            
            // Formato para Twilio
            $destinatario = 'whatsapp:+' . $telefono;
            
            // Inicializar el cliente de Twilio
            $client = new Client($sid, $token);
            
            // Enviar mensaje
            $message = $client->messages->create(
                $destinatario,
                [
                    'from' => $twilioWhatsAppNumber,
                    'body' => $mensaje
                ]
            );
            
            // Registrar el envío
            Log::info("Mensaje WhatsApp enviado correctamente a: $telefono. SID: " . $message->sid);
            return true;
            
        } catch (\Exception $e) {
            // Registrar el error
            Log::error("Error al enviar mensaje de WhatsApp: " . $e->getMessage());
            throw $e;
        }
    }
}