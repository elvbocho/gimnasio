@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-info-circle"></i> Detalle de Membresía</h4>
                </div>
                <div class="card-body">
                    <p><strong>Usuario:</strong> {{ $membresia->usuario->nombre }}</p>
                    <p><strong>Tipo:</strong> {{ ucfirst($membresia->tipo) }}</p>
                    <p><strong>Precio:</strong> {{ number_format($membresia->precio, 2) }} $</p>
                    <p><strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($membresia->fecha_inicio)->format('d/m/Y') }}</p>
                    <p><strong>Fecha de Fin:</strong> {{ \Carbon\Carbon::parse($membresia->fecha_fin)->format('d/m/Y') }}</p>

                    {{-- Lógica para mostrar los días restantes o vencidos --}}
                    @php
                        // Calcular los días restantes o vencidos
                        $diasRestantes = \Carbon\Carbon::parse($membresia->fecha_fin)->diffInDays(\Carbon\Carbon::now());
                        
                        // Si la membresía ha vencido
                        if (\Carbon\Carbon::now()->greaterThan($membresia->fecha_fin)) {
                            $estado = 'vencida';
                            $diasRestantes = abs($diasRestantes);  // Tomamos el valor absoluto si ha vencido
                        } elseif (\Carbon\Carbon::now()->equalTo($membresia->fecha_fin)) {
                            // Si vence hoy
                            $estado = 'vence hoy';
                            $diasRestantes = 0; // Si vence hoy, días restantes es 0
                        } else {
                            // Si la membresía está activa
                            $estado = 'activa';
                        }
                        
                        // Asegurarse de que los días restantes sean enteros sin decimales
                        $diasRestantes = floor($diasRestantes);
                    @endphp

                    <p>
                        <strong>Días Restantes:</strong>
                        @if($estado == 'vencida')
                            <span class="badge badge-danger">{{ $diasRestantes }} días vencida</span>
                        @elseif($estado == 'vence hoy')
                            <span class="badge badge-warning">Vence hoy</span>
                        @else
                            <span class="badge badge-info">{{ $diasRestantes }} días restantes</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('membresias.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
