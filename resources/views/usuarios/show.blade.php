@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-eye"></i> Ver Detalles del Usuario</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nombre:</strong> {{ $usuario->nombre }} {{ $usuario->apellido }}</p>
                            <p><strong>Email:</strong> {{ $usuario->email }}</p>
                            <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
                            <p><strong>Dirección:</strong> {{ $usuario->direccion }}</p>
                            <p><strong>Fecha de Nacimiento:</strong> {{ \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('d/m/Y') }}</p>
                        </div>

                        <div class="col-md-6">
                            <p><strong>Fecha de Inscripción:</strong> {{ \Carbon\Carbon::parse($usuario->fechainscripcion)->format('d/m/Y') }}</p>
                            <p><strong>Número de Socio:</strong> {{ $usuario->numero ?? 'N/A' }}</p>
                            <p><strong>Estado:</strong> 
                                <span class="badge {{ $usuario->estado == 'activo' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($usuario->estado) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
