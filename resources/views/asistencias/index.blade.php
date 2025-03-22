@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')

<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg rounded-3">
        <div class="card-header bg-dark text-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="fas fa-user-check me-2"></i>Lista de Asistencias
                </h4>
                <span class="badge bg-success fs-6">
                    <i class="fas fa-users me-1"></i>
                    Asistencias hoy: {{ $asistencias->where('fecha_hora', '>=', now()->startOfDay())->count() }}
                </span>
                <form action="{{ route('asistencias.clear') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" title="Limpiar lista">
                        <i class="fas fa-eraser"></i> Limpiar lista
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <!-- Tabla de asistencias -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th class="text-center">Método</th>
                            <th class="text-center">Fecha y Hora</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(session('clear_asistencias'))
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-3 d-block"></i>
                                    La lista ha sido limpiada temporalmente.
                                </td>
                            </tr>
                        @else
                            @forelse($asistencias as $asistencia)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            {{ $asistencia->usuario->nombre }} {{ $asistencia->usuario->apellido }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge {{ $asistencia->metodo_registro == 'QR' ? 'bg-primary' : 'bg-secondary' }} px-3 py-2">
                                            <i class="fas {{ $asistencia->metodo_registro == 'QR' ? 'fa-qrcode' : 'fa-keyboard' }} me-1"></i>
                                            {{ ucfirst($asistencia->metodo_registro) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ $asistencia->fecha_hora->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('asistencias.show', $asistencia->id) }}" 
                                               class="btn btn-info btn-sm btn-hover" 
                                               title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('asistencias.edit', $asistencia->id) }}" 
                                               class="btn btn-warning btn-sm btn-hover"
                                               title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-3 d-block"></i>
                                        No hay asistencias registradas.
                                    </td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Botón para restaurar lista -->
            @if(session('clear_asistencias'))
                <div class="text-center mt-3">
                    <a href="{{ route('asistencias.restore') }}" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Restaurar lista
                    </a>
                </div>
            @endif

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-4">
                {{ $asistencias->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos para la paginación */
    .pagination {
        display: flex;
        justify-content: center;
        padding: 0;
        margin: 0;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        border-radius: 50px;
        padding: 8px 16px;
        font-size: 14px;
        color: #007bff;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        color: white;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
    }

    .pagination .page-item .page-link i {
        font-size: 16px;
    }
</style>

@endsection
