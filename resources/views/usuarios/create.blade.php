@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-user-plus"></i> Crear Nuevo Usuario</h4>
                </div>
                <div class="card-body">
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                                    @error('nombre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido"><i class="fas fa-user"></i> Apellido:</label>
                                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                                    @error('apellido')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="direccion"><i class="fas fa-map-marker-alt"></i> Dirección:</label>
                            <textarea class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion">{{ old('direccion') }}</textarea>
                            @error('direccion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_nacimiento"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento:</label>
                            <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                            @error('fecha_nacimiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo para el número (opcional) -->
                        <div class="form-group">
                            <label for="numero"><i class="fas fa-hashtag"></i> Número (opcional):</label>
                            <input type="text" class="form-control @error('numero') is-invalid @enderror" id="numero" name="numero" value="{{ old('numero') }}">
                            @error('numero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo visible de Fecha de Inscripción -->
                        <div class="form-group">
                            <label for="fechainscripcion"><i class="fas fa-calendar-alt"></i> Fecha de Inscripción:</label>
                            <input type="text" class="form-control" id="fechainscripcion" name="fechainscripcion" value="{{ now()->format('d/m/Y') }}" readonly>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contraseña"><i class="fas fa-lock"></i> Contraseña:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('contraseña') is-invalid @enderror" id="contraseña" name="contraseña" required>
                                        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#contraseña"><i class="fas fa-eye"></i></button>
                                    </div>
                                    @error('contraseña')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contraseña_confirmation"><i class="fas fa-lock"></i> Confirmar Contraseña:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="contraseña_confirmation" name="contraseña_confirmation" required>
                                        <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#contraseña_confirmation"><i class="fas fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Crear Usuario</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para mostrar/ocultar contraseñas -->
<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            let input = document.querySelector(this.getAttribute('data-target'));
            input.type = input.type === "password" ? "text" : "password";
            this.innerHTML = input.type === "password" ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    });
</script>
@endsection
