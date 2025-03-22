@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0"><i class="fas fa-bell"></i> Editar Notificación</h4>
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

            <form action="{{ route('notificaciones.update', $notificacion->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="usuario_id">Usuario</label>
                    <select name="usuario_id" id="usuario_id" class="form-control" required>
                        <option value="" disabled selected>Selecciona un usuario</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" 
                                {{ old('usuario_id', $notificacion->usuario_id) == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('usuario_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo de Notificación</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="pago" {{ old('tipo', $notificacion->tipo) == 'pago' ? 'selected' : '' }}>Pago</option>
                        <option value="rutina" {{ old('tipo', $notificacion->tipo) == 'rutina' ? 'selected' : '' }}>Rutina</option>
                        <option value="cumpleaños" {{ old('tipo', $notificacion->tipo) == 'cumpleaños' ? 'selected' : '' }}>Cumpleaños</option>
                        <option value="promocion" {{ old('tipo', $notificacion->tipo) == 'promocion' ? 'selected' : '' }}>Promoción</option>
                    </select>
                    @error('tipo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" rows="4" class="form-control" required>{{ old('mensaje', $notificacion->mensaje) }}</textarea>
                    @error('mensaje')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="estado" class="form-control" required>
                        <option value="enviado" {{ old('estado', $notificacion->estado) == 'enviado' ? 'selected' : '' }}>Enviado</option>
                        <option value="pendiente" {{ old('estado', $notificacion->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    </select>
                    @error('estado')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('notificaciones.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar Notificación</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    .form-control {
        border-radius: 5px;
        padding: 10px;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .alert-danger {
        margin-top: 20px;
    }
</style>

@endsection
