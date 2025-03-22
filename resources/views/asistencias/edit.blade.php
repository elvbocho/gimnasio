@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-edit"></i> Editar Asistencia</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Selección de Usuario -->
                <div class="mb-3">
                    <label for="usuario_id" class="form-label"><i class="fas fa-user"></i> Usuario</label>
                    <select name="usuario_id" id="usuario_id" class="form-control select2">
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ $usuario->id == $asistencia->usuario_id ? 'selected' : '' }}>
                                {{ $usuario->nombre }} {{ $usuario->apellido }}
                            </option>
                        @endforeach
                    </select>
                    @error('usuario_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Método de Registro -->
                <div class="mb-3">
                    <label for="metodo_registro" class="form-label"><i class="fas fa-qrcode"></i> Método de Registro</label>
                    <select name="metodo_registro" id="metodo_registro" class="form-control">
                        <option value="qr" {{ $asistencia->metodo_registro == 'qr' ? 'selected' : '' }}>QR</option>
                        <option value="manual" {{ $asistencia->metodo_registro == 'manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                    @error('metodo_registro')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón de Envío -->
                <button type="submit" class="btn btn-warning btn-lg btn-hover">
                    <i class="fas fa-save"></i> Actualizar Asistencia
                </button>
                <a href="{{ route('asistencias.index') }}" class="btn btn-secondary btn-lg btn-hover">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </form>
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

<!-- Script para mejorar el select -->
@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Seleccione un usuario",
            allowClear: true
        });
    });
</script>
@endpush

@endsection
