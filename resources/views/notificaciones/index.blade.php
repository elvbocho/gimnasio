@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-bell"></i> Notificaciones</h4>
            <a href="{{ route('notificaciones.create') }}" class="btn btn-success btn-hover">
                <i class="fas fa-plus"></i> Crear Notificación
            </a>
        </div>

        <div class="card-body">
            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="alert alert-success" style="margin-top: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabla de Notificaciones -->
            <div class="table-responsive">
                <table class="table table-hover table-striped text-center align-middle">
                   
                        <tr>
                            <th>Tipo</th>
                            <th>Mensaje</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notificaciones as $notificacion)
                            <tr>
                                <td>{{ ucfirst($notificacion->tipo) }}</td>
                                <td>{{ Str::limit($notificacion->mensaje, 50) }}</td>
                                <td>
                                    <span class="badge {{ $notificacion->estado == 'enviado' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($notificacion->estado) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('notificaciones.show', $notificacion->id) }}" class="btn btn-info btn-sm btn-hover">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('notificaciones.edit', $notificacion->id) }}" class="btn btn-primary btn-sm btn-hover">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('notificaciones.destroy', $notificacion->id) }}" method="POST" class="d-inline" 
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta notificación?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-hover">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted text-center">No hay notificaciones disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-3">
                {{ $notificaciones->links() }}
            </div>
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

    /* Agregar bordes redondeados a botones */
    .btn-sm {
        border-radius: 5px;
        padding: 5px 15px;
    }

    /* Mejorar la tabla y colores */
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .thead-dark th {
        background-color: #343a40;
    }

    .badge {
        font-size: 0.85rem;
        padding: 5px 10px;
        border-radius: 10px;
    }
</style>
@endsection
