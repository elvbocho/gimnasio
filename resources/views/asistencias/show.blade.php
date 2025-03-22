@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-info-circle"></i> Detalle de Asistencia</h4>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong><i class="fas fa-user"></i> Usuario:</strong> {{ $asistencia->usuario->nombre }} {{ $asistencia->usuario->apellido }}</li>
                <li class="list-group-item"><strong><i class="fas fa-qrcode"></i> Método de Registro:</strong> 
                    <span class="badge {{ $asistencia->metodo_registro == 'qr' ? 'bg-primary' : 'bg-warning' }}">
                        {{ ucfirst($asistencia->metodo_registro) }}
                    </span>
                </li>
                <li class="list-group-item"><strong><i class="fas fa-calendar-alt"></i> Fecha de Registro:</strong> {{ $asistencia->created_at->format('d/m/Y h:i A') }}</li>
            </ul>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary btn-hover">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
</div>

<!-- Estilos personalizados -->
<style>
    .btn-hover {
        transition: 0.3s ease-in-out;
    }
    .btn-hover:hover {
        transform: scale(1.05);
    }
</style>
@endsection
