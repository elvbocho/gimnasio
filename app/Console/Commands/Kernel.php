<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Ejecutar el comando de reset de asistencias todos los días a las 00:00
        $schedule->command('asistencias:reset')->dailyAt('00:00')->timezone('America/Mexico_City'); // Configurar zona horaria si es necesario
    }

    /**
     * Define the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // Cargar los comandos personalizados
        $this->load(__DIR__.'/Commands');

        // Cargar el archivo routes/console.php para definir comandos adicionales
        require base_path('routes/console.php');
    }
}
