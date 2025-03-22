@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">

<div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-user-check"></i> Rutinas Asignadas</h4>
            <a href="{{ route('rutinas-usuarios.create') }}" class="btn btn-success btn-hover">
                <i class="fas fa-plus"></i> Asignar Nueva Rutina
            </a>
        </div>

        <div class="card-body">
    
   

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Tabla de rutinas asignadas -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Rutina</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rutinasUsuarios as $rutinaUsuario)
                    <tr>
                        <td>{{ $rutinaUsuario->id }}</td>
                        <td>{{ $rutinaUsuario->usuario->nombre }} {{ $rutinaUsuario->usuario->apellido }}</td>
                        <td>{{ $rutinaUsuario->rutina->nombre }}</td>
                        <td>
                            <span class="badge {{ $rutinaUsuario->estado == 'activo' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($rutinaUsuario->estado) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('rutinas-usuarios.show', $rutinaUsuario->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('rutinas-usuarios.edit', $rutinaUsuario->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('rutinas-usuarios.destroy', $rutinaUsuario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    .btn-lg {
        padding: 12px 20px;
        font-size: 1.1rem;
    }
    
    .btn-hover:hover {
        transform: scale(1.05);
        transition: 0.3s ease;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .badge {
        font-size: 1rem;
        padding: 8px 16px;
    }

    .thead-dark th {
        background-color: #343a40;
        color: white;
    }

    .alert-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .alert-success .close {
        color: white;
    }

    .btn i {
        margin-right: 5px;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>
@endsection
