<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendWhatsAppMessage extends Command
{
    // Nombre del comando
    protected $signature = 'send:whatsapp {phone} {message}';

    // Descripción del comando
    protected $description = 'Envía un mensaje de WhatsApp usando pywhatkit';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtener los parámetros
        $phone = $this->argument('phone');
        $message = $this->argument('message');

        // Ruta al script de Python
        $scriptPath = storage_path('app/scripts/whatsapp.py');

        // Ejecutar el script Python
        $command = "python3 $scriptPath $phone $message";
        $output = shell_exec($command);

        $this->info("Mensaje enviado a $phone con el mensaje: $message");
    }
}
