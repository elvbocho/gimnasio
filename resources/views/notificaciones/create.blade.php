@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-bell"></i> Crear Notificación</h4>
        </div>

        <div class="card-body">
            <!-- Mostrar mensajes de error si existen -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('notificaciones.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="usuario_id">Usuario</label>
                    <select name="usuario_id" id="usuario_id" class="form-control" required>
                        <option value="" disabled selected>Selecciona un usuario</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('usuario_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="tipo">Tipo de Notificación</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="pago" {{ old('tipo') == 'pago' ? 'selected' : '' }}>Pago</option>
                        <option value="rutina" {{ old('tipo') == 'rutina' ? 'selected' : '' }}>Rutina</option>
                        <option value="cumpleaños" {{ old('tipo') == 'cumpleaños' ? 'selected' : '' }}>Cumpleaños</option>
                        <option value="promocion" {{ old('tipo') == 'promocion' ? 'selected' : '' }}>Promoción</option>
                    </select>
                    @error('tipo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" class="form-control" rows="4" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="enviado" {{ old('estado') == 'enviado' ? 'selected' : '' }}>Enviado</option>
                        <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    </select>
                    @error('estado')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100"><i class="fas fa-save"></i> Crear Notificación</button>
            </form>

            <div class="mt-3">
                <a href="{{ route('notificaciones.index') }}" class="btn btn-secondary w-100"><i class="fas fa-arrow-left"></i> Volver</a>
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    .form-control {
        border-radius: 5px;
        padding: 10px;
    }

    .btn {
        transition: 0.3s ease-in-out;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .alert-danger {
        margin-top: 20px;
    }

    .w-100 {
        width: 100%;
    }
</style>

@endsection
