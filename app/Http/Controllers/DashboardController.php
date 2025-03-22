<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Total de usuarios inscritos
        $totalUsuarios = Usuario::count();
        
        // 2. Cumpleañeros del mes actual
        $mesActual = Carbon::now()->month;
        $cumpleañeros = Usuario::whereMonth('fecha_nacimiento', $mesActual)
            ->orderByRaw('DAY(fecha_nacimiento)')
            ->get();
            
        // 3. Estadísticas de asistencia por día de la semana
        $asistenciaPorDia = Asistencia::select(
                DB::raw('DAYOFWEEK(fecha_hora) as dia'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('fecha_hora', [Carbon::now()->subDays(30), Carbon::now()])
            ->groupBy('dia')
            ->orderBy('dia')
            ->get()
            ->map(function ($item) {
                $diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                $item->nombre_dia = $diasSemana[$item->dia - 1];
                return $item;
            });
            
        // 4. Estadísticas de asistencia por hora del día
        $asistenciaPorHora = Asistencia::select(
                DB::raw('HOUR(fecha_hora) as hora'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('fecha_hora', [Carbon::now()->subDays(30), Carbon::now()])
            ->groupBy('hora')
            ->orderBy('hora')
            ->get();
            
        // 5. Asistencias de los últimos 7 días
        $ultimosSieteDias = Asistencia::select(
                DB::raw('DATE(fecha_hora) as fecha'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('fecha_hora', [Carbon::now()->subDays(7), Carbon::now()])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();
            
        // 6. Tendencia de asistencia por mes
        $asistenciaPorMes = Asistencia::select(
                DB::raw('YEAR(fecha_hora) as año'),
                DB::raw('MONTH(fecha_hora) as mes'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('fecha_hora', Carbon::now()->year)
            ->groupBy('año', 'mes')
            ->orderBy('año')
            ->orderBy('mes')
            ->get()
            ->map(function ($item) {
                $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                $item->nombre_mes = $meses[$item->mes - 1];
                return $item;
            });
            
        return view('dashboard.index', compact(
            'totalUsuarios', 
            'cumpleañeros', 
            'asistenciaPorDia', 
            'asistenciaPorHora',
            'ultimosSieteDias',
            'asistenciaPorMes'
        ));
    }
}