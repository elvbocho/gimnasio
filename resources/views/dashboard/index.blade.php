@extends('layouts.app')
@section('body-class', 'background-gim')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    try {
        console.log('Iniciando carga de gráficas...');
        
        // Datos para los gráficos
        const diasData = @json($asistenciaPorDia);
        const horasData = @json($asistenciaPorHora);
        const ultimosDiasData = @json($ultimosSieteDias);
        const mesesData = @json($asistenciaPorMes);
        
        console.log('Datos cargados:', {
            dias: diasData,
            horas: horasData,
            ultimosDias: ultimosDiasData,
            meses: mesesData
        });
        
        // Configurar gráfico de días con más asistencia
        const ctxDia = document.getElementById('asistenciaPorDiaChart');
        if (ctxDia) {
            const asistenciaPorDiaChart = new Chart(ctxDia.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: diasData.map(item => item.nombre_dia),
                    datasets: [{
                        label: 'Asistencias',
                        data: diasData.map(item => item.total),
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        } else {
            console.error('No se encontró el elemento asistenciaPorDiaChart');
        }

        // Configurar gráfico de horas con más asistencia
        const ctxHora = document.getElementById('asistenciaPorHoraChart');
        if (ctxHora) {
            const horasFormateadas = horasData.map(item => {
                // Formatear la hora correctamente
                const hora = String(item.hora).padStart(2, '0');
                return `${hora}:00`;
            });
            
            const asistenciaPorHoraChart = new Chart(ctxHora.getContext('2d'), {
                type: 'line',
                data: {
                    labels: horasFormateadas,
                    datasets: [{
                        label: 'Asistencias',
                        data: horasData.map(item => item.total),
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        } else {
            console.error('No se encontró el elemento asistenciaPorHoraChart');
        }

        // Gráfico para los últimos 7 días
        const ctx7Dias = document.getElementById('ultimosSieteDiasChart');
        if (ctx7Dias) {
            // Formatear fechas en JavaScript
            const fechasFormateadas = ultimosDiasData.map(item => {
                const fecha = new Date(item.fecha);
                return `${fecha.getDate()}/${fecha.getMonth() + 1}`;
            });
            
            const ultimosSieteDiasChart = new Chart(ctx7Dias.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: fechasFormateadas,
                    datasets: [{
                        label: 'Asistencias',
                        data: ultimosDiasData.map(item => item.total),
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        } else {
            console.error('No se encontró el elemento ultimosSieteDiasChart');
        }

        // Gráfico para tendencia por mes
        const ctxMes = document.getElementById('asistenciaPorMesChart');
        if (ctxMes) {
            const asistenciaPorMesChart = new Chart(ctxMes.getContext('2d'), {
                type: 'line',
                data: {
                    labels: mesesData.map(item => item.nombre_mes),
                    datasets: [{
                        label: 'Asistencias',
                        data: mesesData.map(item => item.total),
                        backgroundColor: 'rgba(153, 102, 255, 0.7)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        } else {
            console.error('No se encontró el elemento asistenciaPorMesChart');
        }
        
        console.log('Carga de gráficas completada con éxito');
    } catch (error) {
        console.error('Error al inicializar las gráficas:', error);
    }
});
</script>
@endpush

@section('content')
<div class="container-fluid py-4 text-white">
    <h1 class="mb-4">Datos de Gym</h1>

    <!-- Estadísticas rápidas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white stat-card">
                <div class="card-body text-center">
                    <i class="fas fa-users stat-icon"></i>
                    <h2>{{ $totalUsuarios }}</h2>
                    <p class="mb-0">Total de Usuarios</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white stat-card">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-check stat-icon"></i>
                    <h2>{{ $cumpleañeros->count() }}</h2>
                    <p class="mb-0">Cumpleañeros del Mes</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white stat-card">
                <div class="card-body text-center">
                    <i class="fas fa-chart-line stat-icon"></i>
                    @php
                        $asistenciasHoy = \App\Models\Asistencia::whereDate('fecha_hora', today())->count();
                    @endphp
                    <h2>{{ $asistenciasHoy }}</h2>
                    <p class="mb-0">Asistencias Hoy</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white stat-card">
                <div class="card-body text-center">
                    <i class="fas fa-chart-bar stat-icon"></i>
                    @php
                        $asistenciasSemana = \App\Models\Asistencia::whereBetween('fecha_hora', [
                            \Carbon\Carbon::now()->startOfWeek(),
                            \Carbon\Carbon::now()->endOfWeek()
                        ])->count();
                    @endphp
                    <h2>{{ $asistenciasSemana }}</h2>
                    <p class="mb-0">Asistencias esta Semana</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Gráfico de días con más asistencia -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Días con Mayor Asistencia</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:300px;">
                        <canvas id="asistenciaPorDiaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico de horas con más asistencia -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Horarios con Mayor Asistencia</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:300px;">
                        <canvas id="asistenciaPorHoraChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Gráfico de asistencia últimos 7 días -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Asistencia Últimos 7 Días</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:300px;">
                        <canvas id="ultimosSieteDiasChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tendencia mensual -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tendencia de Asistencia por Mes</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:300px;">
                        <canvas id="asistenciaPorMesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cumpleañeros del mes -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cumpleañeros del Mes</h5>
                </div>
                <div class="card-body birthday-list">
                    @if($cumpleañeros->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Cumple Años</th>
                                        <th>Contacto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cumpleañeros as $usuario)
                                    <tr>
                                        <td>{{ $usuario->numero }}</td>
                                        <td>{{ $usuario->nombre }}</td>
                                        <td>{{ $usuario->apellido }}</td>
                                        <td>
                                            @php
                                                // Verificar si fecha_nacimiento es un objeto Carbon, si no, convertirlo
                                                $fechaNacimiento = $usuario->fecha_nacimiento;
                                                if (!($fechaNacimiento instanceof \Carbon\Carbon)) {
                                                    $fechaNacimiento = \Carbon\Carbon::parse($fechaNacimiento);
                                                }
                                                echo $fechaNacimiento->format('d/m/Y');
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                // Asegurar que fecha_nacimiento sea un objeto Carbon
                                                $fechaNac = $usuario->fecha_nacimiento;
                                                if (!($fechaNac instanceof \Carbon\Carbon)) {
                                                    $fechaNac = \Carbon\Carbon::parse($fechaNac);
                                                }
                                                $edad = $fechaNac->age + 1;
                                            @endphp
                                            {{ $edad }} años
                                        </td>
                                        <td>
                                            @if($usuario->telefono)
                                                <i class="fas fa-phone"></i> {{ $usuario->telefono }}
                                            @endif
                                            @if($usuario->email)
                                                <br><i class="fas fa-envelope"></i> {{ $usuario->email }}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No hay cumpleañeros este mes.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection