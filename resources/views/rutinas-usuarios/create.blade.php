@extends('layouts.app')

@section('content')
@section('body-class', 'background-gym')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-user-plus"></i> Asignar Rutina a Usuario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('rutinas-usuarios.store') }}" method="POST">
                        @csrf

                        <!-- Selección de Usuario -->
                        <div class="form-group mb-3">
                            <label for="usuario_id"><i class="fas fa-users"></i> Usuario</label>
                            <select class="form-control @error('usuario_id') is-invalid @enderror" id="usuario_id" name="usuario_id" required>
                                <option value="">Selecciona un usuario</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" data-telefono="{{ $usuario->telefono }}">{{ $usuario->nombre }} {{ $usuario->apellidos ?? $usuario->apellido }}</option>
                                @endforeach
                            </select>
                            @error('usuario_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="telefono-display" class="form-text mt-1"></div>
                        </div>

                        <!-- Selección de Rutina -->
                        <div class="form-group mb-3">
                            <label for="rutina_id"><i class="fas fa-dumbbell"></i> Rutina</label>
                            <select class="form-control @error('rutina_id') is-invalid @enderror" id="rutina_id" name="rutina_id" required>
                                <option value="">Selecciona una rutina</option>
                                @foreach($rutinas as $rutina)
                                    <option value="{{ $rutina->id }}">{{ $rutina->nombre }}</option>
                                @endforeach
                            </select>
                            @error('rutina_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div class="form-group mb-3">
                            <label for="estado"><i class="fas fa-check-circle"></i> Estado</label>
                            <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                                <option value="pendiente">Pendiente</option>
                                <option value="enviado">Enviado</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Opciones para WhatsApp -->
                        <div class="card mt-3 mb-4">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fab fa-whatsapp"></i> Opciones de WhatsApp</h5>
                            </div>
                            <div class="card-body">
                                <!-- Activar/Desactivar WhatsApp -->
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="enviar_whatsapp" name="enviar_whatsapp" value="1" checked>
                                    <label class="form-check-label" for="enviar_whatsapp">Enviar rutina por WhatsApp</label>
                                </div>
                                
                                <!-- Personalización del mensaje -->
                                <div id="opciones_whatsapp">
                                    <div class="form-group">
                                        <label for="mensaje_personalizado"><i class="fas fa-comment-alt"></i> Mensaje personalizado</label>
                                        <textarea class="form-control" id="mensaje_personalizado" name="mensaje_personalizado" rows="3">Hola {nombre}, esta es tu rutina de hoy: {rutina}. ¡Disfruta tu entrenamiento!</textarea>
                                        <small class="form-text text-muted">
                                            Utiliza {nombre} para el nombre del usuario y {rutina} para el nombre de la rutina.
                                        </small>
                                    </div>
                                    
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="incluir_detalles" name="incluir_detalles" value="1">
                                        <label class="form-check-label" for="incluir_detalles">Incluir detalles completos de la rutina</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('rutinas-usuarios.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Asignar Rutina
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mostrar número de teléfono del usuario seleccionado
        const usuarioSelect = document.getElementById('usuario_id');
        const telefonoDisplay = document.getElementById('telefono-display');
        const enviarWhatsAppCheck = document.getElementById('enviar_whatsapp');
        const opcionesWhatsApp = document.getElementById('opciones_whatsapp');
        
        // Mostrar el teléfono del usuario seleccionado
        usuarioSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const telefono = selectedOption.getAttribute('data-telefono');
            
            if (telefono) {
                telefonoDisplay.innerHTML = '<i class="fab fa-whatsapp text-success"></i> Teléfono: ' + telefono;
                telefonoDisplay.classList.remove('text-danger');
                telefonoDisplay.classList.add('text-success');
            } else {
                telefonoDisplay.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Este usuario no tiene número de teléfono registrado';
                telefonoDisplay.classList.remove('text-success');
                telefonoDisplay.classList.add('text-danger');
                enviarWhatsAppCheck.checked = false;
            }
        });
        
        // Mostrar/ocultar opciones de WhatsApp
        enviarWhatsAppCheck.addEventListener('change', function() {
            opcionesWhatsApp.style.display = this.checked ? 'block' : 'none';
        });
        
        // Vista previa del mensaje personalizado
        const rutinasSelect = document.getElementById('rutina_id');
        const mensajePersonalizado = document.getElementById('mensaje_personalizado');
        
        function actualizarVistaPreviaMensaje() {
            const usuarioSeleccionado = usuarioSelect.options[usuarioSelect.selectedIndex];
            const rutinaSeleccionada = rutinasSelect.options[rutinasSelect.selectedIndex];
            
            if (usuarioSeleccionado.value && rutinaSeleccionada.value) {
                const nombreUsuario = usuarioSeleccionado.text.split(' ')[0];
                const nombreRutina = rutinaSeleccionada.text;
                
                // Actualizar el texto del mensaje predeterminado si está vacío
                if (!mensajePersonalizado.value) {
                    mensajePersonalizado.value = `Hola ${nombreUsuario}, esta es tu rutina de hoy: ${nombreRutina}. ¡Disfruta tu entrenamiento!`;
                }
            }
        }
        
        usuarioSelect.addEventListener('change', actualizarVistaPreviaMensaje);
        rutinasSelect.addEventListener('change', actualizarVistaPreviaMensaje);
        
        // Inicializar el estado de las opciones de WhatsApp
        opcionesWhatsApp.style.display = enviarWhatsAppCheck.checked ? 'block' : 'none';
    });
</script>
@endpush
@endsection