@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-dumbbell"></i> Lista de Rutinas de Entrenamiento</h4>
            <a href="{{ route('rutinas-entrenamiento.create') }}" class="btn btn-success btn-hover">
                <i class="fas fa-plus-circle"></i> Nueva Rutina
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Nivel</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rutinas as $rutina)
                            <tr>
                                <td class="fw-bold">{{ $rutina->nombre }}</td>
                                <td>{{ Str::limit($rutina->descripcion, 50) }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $rutina->nivel == 'Principiante' ? 'bg-success' : 
                                           ($rutina->nivel == 'Intermedio' ? 'bg-warning' : 'bg-danger') }}">
                                        {{ ucfirst($rutina->nivel) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('rutinas-entrenamiento.show', $rutina->id) }}" class="btn btn-info btn-sm btn-hover">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('rutinas-entrenamiento.edit', $rutina->id) }}" class="btn btn-warning btn-sm btn-hover">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('rutinas-entrenamiento.destroy', $rutina->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar esta rutina?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-hover">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted">No hay rutinas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-3">
                {{ $rutinas->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .btn-hover {
        transition: 0.3s ease-in-out;
    }
    .btn-hover:hover {
        transform: scale(1.08);
    }
</style>
@endsection
