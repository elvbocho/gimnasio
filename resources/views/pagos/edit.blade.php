{{-- resources/views/pagos/edit.blade.php --}}
@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
            <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-edit"></i> Editar Pago</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pagos.update', $pago->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="usuario_id"><i class="fas fa-user"></i> Usuario</label>
                            <select name="usuario_id" id="usuario_id" class="form-control">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ $pago->usuario_id == $usuario->id ? 'selected' : '' }}>
                                        {{ $usuario->nombre }} {{ $usuario->apellido }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="monto"><i class="fas fa-dollar-sign"></i> Monto</label>
                            <input type="number" name="monto" id="monto" class="form-control" value="{{ $pago->monto }}" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha_pago"><i class="fas fa-calendar-alt"></i> Fecha de Pago</label>
                            <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{ $pago->fecha_pago }}" required>
                        </div>

                        <div class="form-group">
                            <label for="metodo_pago"><i class="fas fa-credit-card"></i> Método de Pago</label>
                            <select name="metodo_pago" id="metodo_pago" class="form-control">
                                <option value="efectivo" {{ $pago->metodo_pago == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                                <option value="tarjeta" {{ $pago->metodo_pago == 'tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                                <option value="transferencia" {{ $pago->metodo_pago == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estado"><i class="fas fa-info-circle"></i> Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="pagado" {{ $pago->estado == 'pagado' ? 'selected' : '' }}>Pagado</option>
                                <option value="pendiente" {{ $pago->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('pagos.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar Pago</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
