<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\RutinaEntrenamientoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\RutinaUsuarioController;
use App\Http\Controllers\WhatsAppController;

use App\Http\Controllers\DashboardController;


//Route::get('/', function () {
//    return view('welcome');
//});


// routes/web.php



// Redirigir automáticamente a /principal
Route::get('/', function () {
    return redirect()->route('principal');
});

Route::get('/principal', function () {
    return view('principal'); // Asegúrate de que este archivo exista en resources/views/principal.blade.php
})->name('principal');

//Ruta de la base de datos 
// Ruta para buscar usuarios
Route::get('/usuarios/buscar', [UsuarioController::class, 'buscar'])->name('usuarios.buscar');
Route::resource('usuarios', UsuarioController::class);


Route::resource('membresias', MembresiaController::class);
Route::resource('pagos', PagoController::class);

Route::get('asistencias/registro', [AsistenciaController::class, 'showRegistroForm'])->name('asistencias.registro');
Route::post('asistencias/registro', [AsistenciaController::class, 'registrarAsistencia'])->name('asistencias.registrar');

Route::post('/asistencias/clear', [AsistenciaController::class, 'clear'])->name('asistencias.clear');

Route::get('/asistencias/restore', [AsistenciaController::class, 'restore'])->name('asistencias.restore');

Route::resource('asistencias', AsistenciaController::class);

Route::resource('rutinas-entrenamiento', RutinaEntrenamientoController::class);
Route::resource('notificaciones', NotificacionController::class);
Route::resource('rutinas-usuarios', RutinaUsuarioController::class);


Route::post('/enviar-mensaje', [WhatsAppController::class, 'enviarMensaje']);

// routes/web.php



Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/pag', function () {return view('presentacion.pag');});
Route::get('/trip', function () {return view('presentacion.trip');});
Route::get('/trip2', function () {return view('presentacion.trip2');});



Route::get('/test-timezone', function () {
    return now(); // Devuelve la fecha y hora actual según la zona horaria configurada
});