@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-dumbbell"></i> Rutina: {{ $rutina->nombre }}</h4>
                </div>
                <div class="card-body">
                    <!-- Descripción de la Rutina -->
                    <div class="mb-3">
                        <p><strong><i class="fas fa-info-circle"></i> Descripción:</strong> {{ $rutina->descripcion }}</p>
                    </div>

                    <!-- Nivel de la Rutina -->
                    <div class="mb-3">
                        <p><strong><i class="fas fa-level-up-alt"></i> Nivel:</strong> {{ ucfirst($rutina->nivel) }}</p>
                    </div>

                    <!-- Botón Volver -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('rutinas-entrenamiento.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver a la lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
