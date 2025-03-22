@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-dumbbell"></i> Editar Rutina: {{ $rutina->nombre }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('rutinas-entrenamiento.update', $rutina->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre de la Rutina -->
                        <div class="form-group">
                            <label for="nombre"><i class="fas fa-heading"></i> Nombre de la Rutina</label>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" required value="{{ old('nombre', $rutina->nombre) }}">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Descripción de la Rutina -->
                        <div class="form-group">
                            <label for="descripcion"><i class="fas fa-info-circle"></i> Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" required>{{ old('descripcion', $rutina->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nivel de la Rutina -->
                        <div class="form-group">
                            <label for="nivel"><i class="fas fa-level-up-alt"></i> Nivel</label>
                            <select name="nivel" id="nivel" class="form-control @error('nivel') is-invalid @enderror" required>
                                <option value="principiante" {{ old('nivel', $rutina->nivel) == 'principiante' ? 'selected' : '' }}>Principiante</option>
                                <option value="intermedio" {{ old('nivel', $rutina->nivel) == 'intermedio' ? 'selected' : '' }}>Intermedio</option>
                                <option value="avanzado" {{ old('nivel', $rutina->nivel) == 'avanzado' ? 'selected' : '' }}>Avanzado</option>
                            </select>
                            @error('nivel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('rutinas-entrenamiento.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar Rutina</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
