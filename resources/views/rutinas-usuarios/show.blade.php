@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-eye"></i> Detalles de la Asignación de Rutina</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID:</th>
                    <td>{{ $rutinaUsuario->id }}</td>
                </tr>
                <tr>
                    <th>Usuario:</th>
                    <td>{{ $rutinaUsuario->usuario->nombre }} {{ $rutinaUsuario->usuario->apellido }}</td>
                </tr>
                <tr>
                    <th>Rutina:</th>
                    <td>{{ $rutinaUsuario->rutina->nombre }}</td>
                </tr>
                <tr>
                    <th>Descripción de la Rutina:</th>
                    <td>{{ $rutinaUsuario->rutina->descripcion }}</td>
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td>
                        <span class="badge {{ $rutinaUsuario->estado == 'enviado' ? 'bg-success' : 'bg-warning' }}">
                            {{ ucfirst($rutinaUsuario->estado) }}
                        </span>
                    </td>
                </tr>
            </table>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('rutinas-usuarios.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                <a href="{{ route('rutinas-usuarios.edit', $rutinaUsuario->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection