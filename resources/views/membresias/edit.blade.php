@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-edit"></i> Editar Membresía</h4>
                </div>
                <div class="card-body">
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('membresias.update', $membresia->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="usuario_id"><i class="fas fa-user"></i> Usuario:</label>
                            <select name="usuario_id" id="usuario_id" class="form-control @error('usuario_id') is-invalid @enderror">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" @if($usuario->id == $membresia->usuario_id) selected @endif>{{ $usuario->nombre }}</option>
                                @endforeach
                            </select>
                            @error('usuario_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tipo"><i class="fas fa-cogs"></i> Tipo de Membresía:</label>
                            <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" onchange="calcularFechaFin()">
                                <option value="mensual" @if($membresia->tipo == 'mensual') selected @endif>Mensual</option>
                                <option value="trimestral" @if($membresia->tipo == 'trimestral') selected @endif>Trimestral</option>
                                <option value="anual" @if($membresia->tipo == 'anual') selected @endif>Anual</option>
                            </select>
                            @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="precio"><i class="fas fa-dollar-sign"></i> Precio:</label>
                            <input type="number" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ $membresia->precio }}" required>
                            @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_inicio"><i class="fas fa-calendar-alt"></i> Fecha de Inicio:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{ $membresia->fecha_inicio }}" required onchange="calcularFechaFin()">
                            @error('fecha_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_fin"><i class="fas fa-calendar-check"></i> Fecha de Fin:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" value="{{ $membresia->fecha_fin }}" required readonly>
                            @error('fecha_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('membresias.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar Membresía</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Función que calcula la fecha de fin basándose en el tipo de membresía y la fecha de inicio
    function calcularFechaFin() {
        let tipo = document.getElementById('tipo').value;
        let fechaInicio = document.getElementById('fecha_inicio').value;
        let fechaFin = document.getElementById('fecha_fin');
        
        if (fechaInicio) {
            let fecha = new Date(fechaInicio);
            
            // Calcular fecha de fin dependiendo del tipo
            switch (tipo) {
                case 'mensual':
                    fecha.setMonth(fecha.getMonth() + 1);
                    break;
                case 'trimestral':
                    fecha.setMonth(fecha.getMonth() + 3);
                    break;
                case 'anual':
                    fecha.setFullYear(fecha.getFullYear() + 1);
                    break;
            }
            
            // Formatear la fecha de fin en formato YYYY-MM-DD
            let fechaFinFormatted = fecha.toISOString().split('T')[0];
            fechaFin.value = fechaFinFormatted;
        }
    }

    // Ejecutar la función para calcular la fecha de fin al cargar la página
    window.onload = function() {
        calcularFechaFin();
    };
</script>

@endsection
