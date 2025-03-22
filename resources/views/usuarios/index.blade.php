@extends('layouts.app')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">  <!-- Enlace al archivo CSS -->

@section('content')
@section('body-class', 'background-gym')

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-users"></i> Lista de Usuarios</h4>
            <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-hover">
                <i class="fas fa-user-plus"></i> Agregar Usuario
            </a>
        </div>

        <div class="card-body">
            <!-- Barra de búsqueda -->
            <div class="row mb-4">
                <div class="col-md-6 mx-auto">
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre, email o número de socio..." autofocus>
                    </div>
                </div>
            </div>

            <!-- Tabla de usuarios -->
            <div class="table-responsive">
                <table class="table table-hover table-striped text-center align-middle" id="usuariosTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Número de Socio</th> 
                            <th>Nombre</th>
                            <th>Email</th> 
                            <th>Estado</th>
                            <th>Fecha de Inscripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr class="usuario-row">
                                <td class="usuario-numero">{{ $usuario->numero }}</td> 
                                <td class="usuario-nombre">{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                                <td class="usuario-email">{{ $usuario->email }}</td>
                                <td>
                                    <span class="badge {{ $usuario->estado == 'activo' ? 'bg-success' : 'bg-danger' }} rounded-pill">
                                        {{ ucfirst($usuario->estado) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y') }}</td> 
                                <td>
                                    <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info btn-sm btn-hover" title="Ver Usuario">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm btn-hover" title="Editar Usuario">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline" 
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-hover" title="Eliminar Usuario">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr id="no-results-default">
                                <td colspan="6" class="text-muted">No hay usuarios registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Mensaje cuando no hay resultados de búsqueda -->
                <div id="no-results" class="text-center p-3 d-none">
                    <p class="text-muted"><i class="fas fa-search me-2"></i>No se encontraron usuarios que coincidan con tu búsqueda.</p>
                </div>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-3">
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Estilos CSS -->
<style>
    .btn-hover {
        transition: 0.3s ease-in-out;
    }
    .btn-hover:hover {
        transform: scale(1.08);
    }

    .badge {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        text-transform: capitalize;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .pagination {
        margin: 0;
    }

    .pagination a {
        text-decoration: none;
    }

    .pagination .page-link {
        border-radius: 50%;
        padding: 8px 12px;
        transition: 0.3s ease-in-out;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        color: white;
    }

    .pagination .active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
    
    #searchInput {
        border-radius: 0 4px 4px 0;
        box-shadow: none;
        transition: all 0.3s;
    }
    
    #searchInput:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    
    .input-group-text {
        border-radius: 4px 0 0 4px;
    }
    
    .highlight {
        background-color: #ffffa0;
    }
</style>

<!-- Script para la búsqueda en tiempo real -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('.usuario-row');
    const noResults = document.getElementById('no-results');
    const noResultsDefault = document.getElementById('no-results-default');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let matchCount = 0;
        
        rows.forEach(row => {
            const numero = row.querySelector('.usuario-numero').textContent.toLowerCase();
            const nombre = row.querySelector('.usuario-nombre').textContent.toLowerCase();
            const email = row.querySelector('.usuario-email').textContent.toLowerCase();
            
            if (numero.includes(searchTerm) || nombre.includes(searchTerm) || email.includes(searchTerm)) {
                row.classList.remove('d-none');
                matchCount++;
            } else {
                row.classList.add('d-none');
            }
        });
        
        // Mostrar/ocultar mensaje de "no hay resultados"
        if (matchCount === 0 && searchTerm !== '') {
            if (noResultsDefault) noResultsDefault.classList.add('d-none');
            noResults.classList.remove('d-none');
        } else {
            if (noResultsDefault) noResultsDefault.classList.remove('d-none');
            noResults.classList.add('d-none');
        }
    });
});
</script>

@endsection