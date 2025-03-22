@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-id-card"></i> Membresías</h4>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Añadir resumen de membresías -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-list"></i> Total Membresías</h5>
                            <h2>{{ $membresias->count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-check-circle"></i> Activas</h5>
                            <h2>
                                @php
                                    $activas = $membresias->filter(function($membresia) {
                                        return \Carbon\Carbon::now()->lessThanOrEqualTo($membresia->fecha_fin);
                                    })->count();
                                    echo $activas;
                                @endphp
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title"><i class="fas fa-times-circle"></i> Vencidas</h5>
                            <h2>
                                @php
                                    $vencidas = $membresias->filter(function($membresia) {
                                        return \Carbon\Carbon::now()->greaterThan($membresia->fecha_fin);
                                    })->count();
                                    echo $vencidas;
                                @endphp
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="mb-0">Lista de Membresías</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('membresias.create') }}" class="btn btn-success btn-hover">
                        <i class="fas fa-plus-circle"></i> Crear Membresía
                    </a>
                </div>
            </div>

            <!-- Barra de búsqueda en tiempo real -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre, tipo de membresía o estado...">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped text-center" id="membresiaTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Tipo</th>
                            <th>Precio</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>
                            <th>Estado</th>
                            <th>Días Restantes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($membresias as $membresia)
                            <tr>
                                <td>{{ $membresia->usuario->nombre }}</td>
                                <td>{{ $membresia->tipoMembresia }}</td>
                                <td>${{ number_format($membresia->precio, 2) }}</td>
                                <td>{{ \Carbon\Carbon::parse($membresia->fecha_inicio)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($membresia->fecha_fin)->format('d/m/Y') }}</td>

                                <!-- Mostrar estado de la membresía -->
                                <td>
                                    @if($membresia->estadoMembresia == 'Expirada')
                                        <span class="badge badge-danger">Vencida</span>
                                    @else
                                        <span class="badge badge-success">Activa</span>
                                    @endif
                                </td>

                                <!-- Mostrar los días restantes (corregido) -->
                                <td>
                                    @php
                                        // Calcula los días restantes correctamente
                                        $diasRestantes = \Carbon\Carbon::parse($membresia->fecha_fin)->diffInDays(\Carbon\Carbon::now());

                                        // Si la membresía ya venció
                                        if (\Carbon\Carbon::now()->greaterThan($membresia->fecha_fin)) {
                                            $estado = 'vencida';
                                            $diasRestantes = abs($diasRestantes); // Tomamos el valor absoluto si ha vencido
                                        } elseif (\Carbon\Carbon::now()->equalTo($membresia->fecha_fin)) {
                                            // Si vence hoy
                                            $estado = 'vence hoy';
                                            $diasRestantes = 0; // Si vence hoy, días restantes es 0
                                        } else {
                                            // Si la membresía está activa
                                            $estado = 'activa';
                                        }

                                        // Asegurarse de que los días restantes sean enteros sin decimales
                                        $diasRestantes = floor($diasRestantes);
                                    @endphp

                                    @if($estado == 'vencida')
                                        <span class="badge badge-danger">{{ $diasRestantes }} días vencida</span>
                                    @elseif($estado == 'vence hoy')
                                        <span class="badge badge-warning">Vence hoy</span>
                                    @else
                                        <span class="badge badge-info">{{ $diasRestantes }} días restantes</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('membresias.show', $membresia->id) }}" class="btn btn-info btn-sm btn-hover" title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('membresias.edit', $membresia->id) }}" class="btn btn-warning btn-sm btn-hover" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Enlace para registrar un pago -->
                                        <a href="{{ route('pagos.create', ['usuario_id' => $membresia->usuario->id, 'precio' => $membresia->precio]) }}" class="btn btn-primary btn-sm btn-hover" title="Registrar Pago">
                                            <i class="fas fa-credit-card"></i>
                                        </a>

                                        <form action="{{ route('membresias.destroy', $membresia->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-hover" onclick="return confirm('¿Seguro que deseas eliminar esta membresía?');" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación si existe -->
            @if(isset($membresias) && method_exists($membresias, 'links'))
                <div class="mt-3 d-flex justify-content-center">
                    {{ $membresias->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    .btn-hover {
        transition: 0.3s ease-in-out;
    }
    .btn-hover:hover {
        transform: scale(1.08);
    }
    
    .table-responsive {
        overflow-x: auto;
    }
    
    /* Asegurarse que la tabla se expanda correctamente */
    .table {
        width: 100%;
        min-width: 900px; /* Ancho mínimo para asegurar visibilidad en dispositivos pequeños */
    }
    
    /* Mejorar la apariencia en móviles */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }
    }
    
    /* Estilo para mejorar la legibilidad de los badges */
    .badge {
        font-size: 85%;
        padding: 5px 8px;
    }

    /* Estilos para las tarjetas de resumen */
    .card h2 {
        font-size: 2.5rem;
        font-weight: bold;
    }
    
    .card-title {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }
    
    /* Estilo para la barra de búsqueda */
    .input-group-text {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    
    #searchInput {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    
    /* Estilo para las filas ocultas */
    .hidden-row {
        display: none;
    }
</style>

<!-- Script para la búsqueda en tiempo real -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    
    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#membresiaTable tbody tr');
        
        rows.forEach(function(row) {
            const nombre = row.cells[0].textContent.toLowerCase();
            const tipo = row.cells[1].textContent.toLowerCase();
            const estado = row.cells[5].textContent.toLowerCase();
            const diasRestantes = row.cells[6].textContent.toLowerCase();
            
            // Buscar en múltiples columnas
            if (nombre.includes(searchTerm) || 
                tipo.includes(searchTerm) || 
                estado.includes(searchTerm) ||
                diasRestantes.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>

@endsection