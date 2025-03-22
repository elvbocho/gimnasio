{{-- resources/views/pagos/show.blade.php --}}
@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
            <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-receipt"></i> Detalles del Pago</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong><i class="fas fa-user"></i> Usuario:</strong> {{ $pago->usuario->nombre }} {{ $pago->usuario->apellido }}</li>
                        <li class="list-group-item"><strong><i class="fas fa-dollar-sign"></i> Monto:</strong> {{ number_format($pago->monto, 2) }} USD</li>
                        <li class="list-group-item"><strong><i class="fas fa-calendar-alt"></i> Fecha de Pago:</strong> {{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</li>
                        <li class="list-group-item"><strong><i class="fas fa-credit-card"></i> Método de Pago:</strong> {{ ucfirst($pago->metodo_pago) }}</li>
                        <li class="list-group-item"><strong><i class="fas fa-info-circle"></i> Estado:</strong> 
                            <span class="badge {{ $pago->estado == 'pagado' ? 'badge-success' : 'badge-warning' }}">
                                {{ ucfirst($pago->estado) }}
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('pagos.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
