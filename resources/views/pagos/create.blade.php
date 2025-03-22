@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-cash-register"></i> Registrar Pago</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pagos.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="usuario_id"><i class="fas fa-user"></i> Usuario</label>
                            <select name="usuario_id" id="usuario_id" class="form-control">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}"
                                        @if(isset($usuario_id) && $usuario->id == $usuario_id) selected @endif>
                                        {{ $usuario->nombre }} {{ $usuario->apellido }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="monto"><i class="fas fa-dollar-sign"></i> Monto</label>
                            <!-- Este campo tendrá el precio que pasamos desde el índice -->
                            <input type="number" name="monto" id="monto" class="form-control" value="{{ $precio }}" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha_pago"><i class="fas fa-calendar-alt"></i> Fecha de Pago</label>
                            <!-- Este campo tendrá la fecha actual -->
                            <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{ $fechaActual }}" required>
                        </div>

                        <div class="form-group">
                            <label for="metodo_pago"><i class="fas fa-credit-card"></i> Método de Pago</label>
                            <select name="metodo_pago" id="metodo_pago" class="form-control">
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                                <option value="transferencia">Transferencia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estado"><i class="fas fa-info-circle"></i> Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="pagado">Pagado</option>
                                <option value="pendiente">Pendiente</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('pagos.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar Pago</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
