@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')

<div class="container py-5">
    <div class="row">
        <!-- FORMULARIO (IZQUIERDA) -->
        <div class="col-md-7">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-user-check me-2"></i>Registro de Asistencia
                    </h5>
                </div>

                <div class="card-body px-4 py-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <script>
                            setTimeout(function() {
                                window.location.href = '{{ route("principal") }}';
                            }, 5000);
                        </script>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('asistencias.registrar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="metodo" value="numero" id="metodo_actual">

                        <!-- Opciones de registro -->
                        <div class="mb-4">
                            <label class="form-label text-muted">
                                <i class="fas fa-users me-2"></i>Seleccione Método de Registro
                            </label>
                            <div class="d-flex gap-3 justify-content-center">
                                <div>
                                    <input type="radio" id="registro_numero" name="metodo_seleccion" value="numero" checked>
                                    <label for="registro_numero" class="form-label">Con Número de Socio</label>
                                </div>
                                <div>
                                    <input type="radio" id="registro_nombre" name="metodo_seleccion" value="nombre">
                                    <label for="registro_nombre" class="form-label">Con Nombre y Contraseña</label>
                                </div>
                            </div>
                        </div>

                        <!-- Formulario para número de socio -->
                        <div id="form-numero" class="form-group">
                            <div class="mb-4">
                                <label for="numero" class="form-label text-muted">
                                    <i class="fas fa-id-card me-2"></i>Número de Socio
                                </label>
                                <input type="text" 
                                       name="numero" 
                                       id="numero" 
                                       class="form-control form-control-lg bg-light" 
                                       value="{{ old('numero') }}" 
                                       autocomplete="off"
                                       required
                                       placeholder="Ingresa tu número de socio">
                            </div>
                        </div>

                        <!-- Formulario para nombre y contraseña -->
                        <div id="form-nombre" class="form-group" style="display: none;">
                            <div class="mb-3">
                                <label for="nombre" class="form-label text-muted">
                                    <i class="fas fa-user me-2"></i>Primer Nombre
                                </label>
                                <input type="text" 
                                       name="nombre" 
                                       id="nombre" 
                                       class="form-control form-control-lg bg-light" 
                                       value="{{ old('nombre') }}" 
                                       autocomplete="off"
                                       placeholder="Ingresa tu nombre">
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label text-muted">
                                    <i class="fas fa-user me-2"></i>Apellido
                                </label>
                                <input type="text" 
                                       name="apellido" 
                                       id="apellido" 
                                       class="form-control form-control-lg bg-light" 
                                       value="{{ old('apellido') }}" 
                                       autocomplete="off"
                                       placeholder="Ingresa tu apellido">
                            </div>

                            <div class="mb-4">
                                <label for="contraseña" class="form-label text-muted">
                                    <i class="fas fa-lock me-2"></i>Contraseña
                                </label>
                                <div class="input-group">
                                    <input type="password" 
                                           name="contraseña" 
                                           id="contraseña" 
                                           class="form-control form-control-lg bg-light" 
                                           placeholder="Ingresa tu contraseña">
                                    <button class="btn btn-light border" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100">
                            <i class="fas fa-check-circle me-2"></i>Registrar Asistencia
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- RELOJ Y MENSAJES (DERECHA) -->
        <div class="col-md-5">
            <!-- Reloj y Fecha -->
            <div class="text-center mb-4 p-4 bg-gradient-primary rounded-3 shadow">
                <div id="date-time" class="display-4 font-weight-bold text-white mb-2"></div>
                <div id="date" class="h5 text-light"></div>
            </div>

            <!-- Mensaje Motivacional -->
            <div id="motivational-message" class="text-center p-4 bg-light rounded-3 shadow-sm">
                <p class="font-italic h4 text-dark mb-0" id="motivational-text">¡Estás en el camino correcto! Sigue entrenando con fuerza.</p>
            </div>
            
            <!-- Banner Promocional -->
            <div class="mt-4 p-4 bg-gradient-secondary rounded-3 shadow">
                <h5 class="text-white mb-3">¡Promoción del Mes!</h5>
                <div class="d-flex align-items-center">
                    <div class="fitness-icon me-3">
                        <i class="fas fa-dumbbell fa-3x text-white"></i>
                    </div>
                    <div>
                        <p class="text-white mb-2">Trae un amigo y obtén 20% de descuento en tu próxima mensualidad</p>
                        <a href="#" class="btn btn-sm btn-light">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos para el reloj */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
    }
    
    .bg-gradient-secondary {
        background: linear-gradient(135deg, #ff7e5f, #feb47b);
    }

    .display-4 {
        font-size: 3.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Estilos para el mensaje motivacional */
    #motivational-message {
        background: linear-gradient(135deg, #f6d365, #fda085);
        min-height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeIn 2s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Efecto hover para los botones */
    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .form-control {
        border-radius: 10px;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #5d9b8b;
        box-shadow: 0 0 5px rgba(93,155,139,0.5);
    }

    .card {
        border-radius: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        height: 100%;
    }

    .alert {
        border-left: 5px solid #198754;
        background-color: #f8f9fa;
    }

    .alert-danger {
        border-left-color: #dc3545;
    }

    .input-group button {
        border-radius: 0 10px 10px 0;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .input-group button:hover {
        background-color: #f0f0f0;
    }
    
    /* Estilos adicionales para los componentes de la derecha */
    @media (min-width: 768px) {
        .card {
            min-height: 450px;
        }
    }
    
    .fitness-icon {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Función para alternar visibilidad de contraseña
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('contraseña');
        const icon = this.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Función para manejar los campos required
    function toggleRequiredFields() {
        const nombreInputs = ['nombre', 'apellido', 'contraseña'].map(id => document.getElementById(id));
        const numeroInput = document.getElementById('numero');
        const isNumeroMethod = document.getElementById('registro_numero').checked;
        
        nombreInputs.forEach(input => {
            input.required = !isNumeroMethod;
        });
        numeroInput.required = isNumeroMethod;
        
        // Actualizar el valor del método actual
        document.getElementById('metodo_actual').value = isNumeroMethod ? 'numero' : 'nombre';
    }

    // Mostrar u ocultar formularios según la selección
    document.querySelectorAll('input[name="metodo_seleccion"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (document.getElementById('registro_nombre').checked) {
                document.getElementById('form-nombre').style.display = 'block';
                document.getElementById('form-numero').style.display = 'none';
            } else if (document.getElementById('registro_numero').checked) {
                document.getElementById('form-nombre').style.display = 'none';
                document.getElementById('form-numero').style.display = 'block';
            }
            toggleRequiredFields();
        });
    });

    // Ejecutar al cargar la página
    toggleRequiredFields();

    // Función para actualizar la hora y fecha en tiempo real
    function updateDateTime() {
        const now = new Date();
        const dateTimeElement = document.getElementById('date-time');
        const dateElement = document.getElementById('date');

        // Formatear la hora en AM/PM
        let hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12; // Convertir a formato 12 horas

        // Formatear la fecha
        const daysOfWeek = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        const months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
        const dayOfWeek = daysOfWeek[now.getDay()];
        const dayOfMonth = now.getDate();
        const month = months[now.getMonth()];
        const year = now.getFullYear();

        // Actualizar el contenido del reloj y la fecha
        dateTimeElement.innerHTML = `${hours}:${minutes}:${seconds} <small>${ampm}</small>`;
        dateElement.innerHTML = `${dayOfWeek} ${dayOfMonth} de ${month} de ${year}`;
    }

    // Actualizar la hora cada segundo
    setInterval(updateDateTime, 1000);
    updateDateTime();

    // Mensajes de motivación
    const motivationalMessages = [
        "¡Estás en el camino correcto! Sigue entrenando con fuerza.",
        "Cada entrenamiento te acerca más a tus metas.",
        "¡No pares, lo lograrás!",
        "Recuerda, el éxito es el resultado de la constancia.",
        "¡Sigue trabajando duro, cada esfuerzo cuenta!",
        "Tu cuerpo puede soportar casi todo. Es tu mente la que debes convencer.",
        "El dolor que sientes hoy será la fuerza que sentirás mañana."
    ];

    const motivationalText = document.getElementById('motivational-text');
    let currentMessageIndex = 0
    function changeMotivationalMessage() {
        motivationalText.style.opacity = 0;
        setTimeout(() => {
            motivationalText.innerHTML = motivationalMessages[currentMessageIndex];
            motivationalText.style.opacity = 1;
            currentMessageIndex = (currentMessageIndex + 1) % motivationalMessages.length;
        }, 500);
    }

    // Cambiar el mensaje cada 5 segundos
    setInterval(changeMotivationalMessage, 5000);
    
    // Añadir efecto de pulsación al reloj
    const clockElement = document.getElementById('date-time');
    function pulseClock() {
        clockElement.classList.add('pulse-animation');
        setTimeout(() => {
            clockElement.classList.remove('pulse-animation');
        }, 1000);
    }
    
    // Aplicar la animación de pulsación cada minuto
    setInterval(pulseClock, 60000);
    
    // Animación de entrada para los elementos
    const elementsToAnimate = [
        document.querySelector('.card'),
        document.getElementById('motivational-message'),
        document.querySelector('.bg-gradient-primary'),
        document.querySelector('.bg-gradient-secondary')
    ];
    
    elementsToAnimate.forEach((element, index) => {
        setTimeout(() => {
            element.classList.add('fade-in-element');
        }, index * 200);
    });
});
</script>

<style>
    /* Animación de pulsación para el reloj */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .pulse-animation {
        animation: pulse 1s ease-in-out;
    }
    
    /* Animación para entrada de elementos */
    @keyframes fadeSlideIn {
        from { 
            opacity: 0;
            transform: translateY(20px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fade-in-element {
        animation: fadeSlideIn 0.8s ease-out forwards;
    }
    
    /* Estilos responsivos */
    @media (max-width: 767px) {
        .col-md-5, .col-md-7 {
            margin-bottom: 2rem;
        }
        
        .bg-gradient-secondary {
            margin-top: 2rem;
        }
    }
    
    /* Cambio de color para el formulario activo */
    #form-numero, #form-nombre {
        transition: all 0.5s ease;
        padding: 1rem;
        border-radius: 10px;
    }
    
    #form-numero {
        background-color: rgba(37, 117, 252, 0.05);
    }
    
    #form-nombre {
        background-color: rgba(106, 17, 203, 0.05);
    }
    
    /* Mejora estética para los radio buttons */
    input[type="radio"] {
        cursor: pointer;
        width: 1.2em;
        height: 1.2em;
        margin-right: 0.5em;
        vertical-align: middle;
    }
    
    input[type="radio"] + label {
        cursor: pointer;
    }
    
    /* Animación para botón de submit */
    .btn-success {
        position: relative;
        overflow: hidden;
    }
    
    .btn-success::after {
        content: "";
        position: absolute;
        top: -50%;
        left: -60%;
        width: 200%;
        height: 200%;
        opacity: 0;
        transform: rotate(30deg);
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 100%);
        transition: all 0.6s ease-out;
    }
    
    .btn-success:hover::after {
        opacity: 1;
        left: 100%;
    }
</style>

@endsection