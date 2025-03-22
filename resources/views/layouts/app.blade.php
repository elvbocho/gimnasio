<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE GYMS</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Estilo para Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Estilos personalizados -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
    <style>
        /* Estilos personalizados */
        body {
            background-color: #f8f9fa;
        }
        
        /* Clase para agregar la imagen de fondo */
        .background-gym {
            background: url("{{ asset('img/20.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }

        .background-gim {
            background: url("{{ asset('img/16.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }

        .navbar {
            background: #1e1e2d;
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff;
        }
        .navbar-brand:hover {
            color: #f8b400;
        }
        .nav-link {
            color: #fff !important;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: #f8b400 !important;
            transform: scale(1.05);
        }
        .nav-item .active {
            background: #f8b400;
            border-radius: 5px;
            color: #fff !important;
        }
    </style>
    
    <!-- Estilos adicionales de las vistas -->
    @stack('styles')
</head>
<body class="@yield('body-class')">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/principal') }}">SISTEMA DE GYMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Menú de navegación">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Usuarios -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('usuarios.index') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
                            <i class="fas fa-users"></i> Usuarios
                        </a>
                    </li>

                    <!-- Membresías -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('membresias.index') ? 'active' : '' }}" href="{{ route('membresias.index') }}">
                            <i class="fas fa-id-card"></i> Membresías
                        </a>
                    </li>

                    <!-- Pagos -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pagos.index') ? 'active' : '' }}" href="{{ route('pagos.index') }}">
                            <i class="fas fa-credit-card"></i> Pagos
                        </a>
                    </li>

                    <!-- Asistencias -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('asistencias.index') ? 'active' : '' }}" href="{{ route('asistencias.index') }}">
                            <i class="fas fa-check-circle"></i> Asistencias
                        </a>
                    </li>

                    <!-- Rutinas de Entrenamiento -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutinas-entrenamiento.index') ? 'active' : '' }}" href="{{ route('rutinas-entrenamiento.index') }}">
                            <i class="fas fa-dumbbell"></i> Rutinas
                        </a>
                    </li>

                    <!-- Notificaciones -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('notificaciones.index') ? 'active' : '' }}" href="{{ route('notificaciones.index') }}">
                            <i class="fas fa-bell"></i> Notificaciones
                        </a>
                    </li>

                    <!-- Rutinas de Usuario -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('rutinas-usuarios.index') ? 'active' : '' }}" href="{{ route('rutinas-usuarios.index') }}">
                            <i class="fas fa-user-clock"></i> Rutinas Usuario
                        </a>
                    </li>

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Datos 
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- jQuery primero (IMPORTANTE: debe ir antes de select2 y otros scripts que dependan de jQuery) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para Select2 (después de jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    
    <!-- Inicialización básica de Select2 -->
    <script>
        $(document).ready(function() {
            // Inicializar Select2 en todos los selectores con la clase .select2
            if($.fn.select2) {
                $('.select2').select2();
            }
        });
    </script>
    
    <!-- Scripts adicionales de las vistas -->
    @stack('scripts')
</body>
</html>
