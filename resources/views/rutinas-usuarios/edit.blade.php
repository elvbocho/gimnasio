@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-edit"></i> Editar Asignación de Rutina</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('rutinas-usuarios.update', $rutinaUsuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Usuario -->
                        <div class="form-group">
                            <label for="usuario_id"><i class="fas fa-users"></i> Usuario</label>
                            <select class="form-control @error('usuario_id') is-invalid @enderror" id="usuario_id" name="usuario_id" disabled>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ $usuario->id == $rutinaUsuario->usuario_id ? 'selected' : '' }}>
                                        {{ $usuario->nombre }} {{ $usuario->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @error('usuario_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Rutina -->
                        <div class="form-group">
                            <label for="rutina_id"><i class="fas fa-dumbbell"></i> Rutina</label>
                            <select class="form-control @error('rutina_id') is-invalid @enderror" id="rutina_id" name="rutina_id" disabled>
                                @foreach($rutinas as $rutina)
                                    <option value="{{ $rutina->id }}" {{ $rutina->id == $rutinaUsuario->rutina_id ? 'selected' : '' }}>
                                        {{ $rutina->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rutina_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div class="form-group">
                            <label for="estado"><i class="fas fa-check-circle"></i> Estado</label>
                            <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado">
                                <option value="pendiente" {{ $rutinaUsuario->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="enviado" {{ $rutinaUsuario->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('rutinas-usuarios.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
