<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    public function enviarMensaje(Request $request)
    {
        $telefono = $request->input('telefono');
        $mensaje = $request->input('mensaje');

        // Construir el comando para ejecutar Python
        $comando = escapeshellcmd("python3 " . storage_path('app/whatsapp.py') . " $telefono \"$mensaje\"");
        $output = shell_exec($comando);

        return response()->json(['mensaje' => 'Mensaje enviado', 'output' => $output]);
    }
}
