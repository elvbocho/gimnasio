{{-- resources/views/pagos/index.blade.php --}}
@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-credit-card"></i> Lista de Pagos</h4>
                    <a href="{{ route('pagos.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Registrar Pago</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Barra de búsqueda y selector de meses -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por usuario, monto o método de pago..." autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select id="monthSelector" class="form-control">
                                <option value="todos">Todos los meses</option>
                                @foreach($mesesDisponibles as $mes)
                                    <option value="{{ $mes }}">{{ $nombresMeses[$mes] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Contenedor para pagos mensuales -->
                    <div id="pagosPorMes">
                        @foreach($pagosPorMes as $mes => $pagos)
                            <div class="mes-container" data-mes="{{ $mes }}" data-total="{{ $totalesPorMes[$mes] }}">
                                <div class="card mb-4">
                                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">{{ $nombresMeses[$mes] }}</h5>
                                        <h5 class="mb-0 total-mes">Total: {{ number_format($totalesPorMes[$mes], 2) }} $</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Usuario</th>
                                                        <th>Monto</th>
                                                        <th>Fecha de Pago</th>
                                                        <th>Método</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="pagos-body">
                                                    @foreach ($pagos as $pago)
                                                        <tr class="pago-row" data-monto="{{ $pago->monto }}">
                                                            <td class="pago-id">{{ $pago->id }}</td>
                                                            <td class="pago-usuario">{{ $pago->usuario->nombre }} {{ $pago->usuario->apellido }}</td>
                                                            <td class="pago-monto">{{ number_format($pago->monto, 2) }} $</td>
                                                            <td class="pago-fecha">{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                                                            <td class="pago-metodo">{{ ucfirst($pago->metodo_pago) }}</td>
                                                            <td>
                                                                <span class="badge {{ $pago->estado == 'pagado' ? 'badge-success' : 'badge-warning' }}">
                                                                    {{ ucfirst($pago->estado) }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('pagos.show', $pago->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                                    <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                                    <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este pago?')"><i class="fas fa-trash"></i></button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot class="bg-light">
                                                    <tr>
                                                        <td colspan="2" class="text-right font-weight-bold">Total del mes:</td>
                                                        <td colspan="5" class="font-weight-bold total-mes-valor">{{ number_format($totalesPorMes[$mes], 2) }} $</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Mensaje de no resultados -->
                    <div id="no-results" class="text-center p-3 d-none">
                        <p class="text-muted"><i class="fas fa-search me-2"></i>No se encontraron pagos que coincidan con tu búsqueda.</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>Pagos visibles: <span class="badge badge-primary" id="contador-pagos">{{ count($pagos) }}</span></div>
                        <div>Total: <span class="badge badge-success" id="total-dinamico">{{ number_format($totalGeneral, 2) }} $</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .badge {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
    }
    
    .btn-group .btn {
        margin-right: 2px;
    }
    
    .table-responsive {
        overflow-x: auto;
    }
    
    .input-group .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    
    .highlight {
        background-color: #ffffa0;
    }
    
    .mes-container {
        transition: all 0.3s ease;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Búsqueda en tiempo real
    const searchInput = document.getElementById('searchInput');
    const monthSelector = document.getElementById('monthSelector');
    const mesContainers = document.querySelectorAll('.mes-container');
    const noResults = document.getElementById('no-results');
    const contadorPagos = document.getElementById('contador-pagos');
    const totalDinamico = document.getElementById('total-dinamico');
    
    // Función para filtrar pagos y actualizar totales
    function filterPayments() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedMonth = monthSelector.value;
        
        let totalPagosVisibles = 0;
        let totalMontoVisible = 0;
        
        // Primero, filtramos por mes
        mesContainers.forEach(container => {
            const mes = container.dataset.mes;
            
            if (selectedMonth === 'todos' || selectedMonth === mes) {
                container.classList.remove('d-none');
                
                // Luego, filtramos por término de búsqueda
                const rows = container.querySelectorAll('.pago-row');
                let matchCount = 0;
                let totalMesFiltrado = 0;
                
                rows.forEach(row => {
                    const id = row.querySelector('.pago-id').textContent.toLowerCase();
                    const usuario = row.querySelector('.pago-usuario').textContent.toLowerCase();
                    const monto = row.querySelector('.pago-monto').textContent.toLowerCase();
                    const metodo = row.querySelector('.pago-metodo').textContent.toLowerCase();
                    const montoValor = parseFloat(row.dataset.monto);
                    
                    if (searchTerm === '' || 
                        id.includes(searchTerm) || 
                        usuario.includes(searchTerm) || 
                        monto.includes(searchTerm) || 
                        metodo.includes(searchTerm)) {
                        row.classList.remove('d-none');
                        matchCount++;
                        totalPagosVisibles++;
                        totalMesFiltrado += montoValor;
                        totalMontoVisible += montoValor;
                    } else {
                        row.classList.add('d-none');
                    }
                });
                
                // Actualizamos el total del mes según los resultados filtrados
                const totalMesElement = container.querySelector('.total-mes');
                const totalMesValorElement = container.querySelector('.total-mes-valor');
                
                if (totalMesElement && searchTerm !== '') {
                    totalMesElement.textContent = `Total filtrado: ${totalMesFiltrado.toFixed(2)} $`;
                    totalMesValorElement.textContent = `${totalMesFiltrado.toFixed(2)} $`;
                } else if (totalMesElement) {
                    const mesTotal = parseFloat(container.dataset.total);
                    totalMesElement.textContent = `Total: ${mesTotal.toFixed(2)} $`;
                    totalMesValorElement.textContent = `${mesTotal.toFixed(2)} $`;
                }
                
                // Si no hay coincidencias en este mes, ocultamos el contenedor
                if (matchCount === 0 && searchTerm !== '') {
                    container.classList.add('d-none');
                }
            } else {
                container.classList.add('d-none');
            }
        });
        
        // Actualizamos contador y total dinámico
        contadorPagos.textContent = totalPagosVisibles;
        totalDinamico.textContent = `${totalMontoVisible.toFixed(2)} $`;
        
        // Mostrar mensaje de no resultados si es necesario
        if (totalPagosVisibles === 0) {
            noResults.classList.remove('d-none');
        } else {
            noResults.classList.add('d-none');
        }
    }
    
    // Eventos para búsqueda y filtrado
    searchInput.addEventListener('input', filterPayments);
    monthSelector.addEventListener('change', filterPayments);
});
</script>
@endsection