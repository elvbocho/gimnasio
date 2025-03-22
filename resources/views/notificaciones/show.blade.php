@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-bell"></i> Detalles de la Notificación</h4>
        </div>

        <div class="card-body">
            <!-- Detalles de la notificación -->
            <div class="mb-4 p-4 border rounded-lg" style="background-color: #f8f9fa;">
                <div class="mb-3">
                    <strong>Tipo:</strong> <span class="text-uppercase">{{ $notificacion->tipo }}</span>
                </div>

                <div class="mb-3">
                    <strong>Mensaje:</strong> <p class="text-muted">{{ $notificacion->mensaje }}</p>
                </div>

                <div class="mb-3">
                    <strong>Estado:</strong>
                    <span class="badge {{ $notificacion->estado == 'enviado' ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ ucfirst($notificacion->estado) }}
                    </span>
                </div>

                <div class="mb-3">
                    <strong>Usuario:</strong> <span class="text-primary">{{ $notificacion->usuario->nombre }}</span>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('notificaciones.index') }}" class="btn btn-secondary btn-lg w-45">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>

                <a href="{{ route('notificaciones.edit', $notificacion->id) }}" class="btn btn-primary btn-lg w-45">
                    <i class="fas fa-edit"></i> Editar
                </a>

                <!-- Confirmación de eliminación -->
                <form action="{{ route('notificaciones.destroy', $notificacion->id) }}" method="POST" class="w-45" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta notificación?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg w-100">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    .btn-lg {
        padding: 12px 20px;
        font-size: 1.1rem;
    }
    
    .card {
        border-radius: 8px;
    }

    .btn:hover {
        transform: scale(1.05);
        transition: 0.3s ease;
    }

    .w-45 {
        width: 45%;
    }

    .text-primary {
        font-weight: 600;
    }

    .badge {
        font-size: 1rem;
        padding: 8px 16px;
    }

    .card-header i {
        margin-right: 8px;
    }
</style>

@endsection
