<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asistencia;
use Carbon\Carbon;

class ResetAsistencias extends Command
{
    protected $signature = 'asistencias:reset';
    protected $description = 'Elimina todas las asistencias anteriores al día de hoy';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Eliminar asistencias anteriores a hoy
        Asistencia::where('fecha_hora', '<', Carbon::today())->delete();
        
        $this->info('Las asistencias anteriores a hoy han sido eliminadas.');
    }
}
