<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Membresia extends Model
{
    // Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'usuario_id', 'tipo', 'precio', 'fecha_inicio', 'fecha_fin',
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Método para calcular el precio dependiendo del tipo de membresía
    public function calcularPrecio()
    {
        // Lógica para calcular el precio dependiendo del tipo de membresía
        if ($this->tipo == 'mensual') {
            return $this->precio;
        } elseif ($this->tipo == 'trimestral') {
            return $this->precio * 3; // Precio para tres meses
        } elseif ($this->tipo == 'anual') {
            return $this->precio * 12; // Precio para un año
        }
        return 0; // Valor por defecto
    }

    // Accesor para obtener el mensaje de "Pago Próximo"
    public function getPagoProximoAttribute()
    {
        // Si la fecha de vencimiento (fecha_fin) es dentro de un mes
        $fecha_pago_proximo = now()->addMonth();
        
        // Si la fecha de vencimiento es dentro de un mes o menos
        return $this->fecha_fin <= $fecha_pago_proximo ? 'Pago próximo' : null;
    }

    // Accesor para obtener la fecha de inscripción del usuario
    public function getFechaInscripcionAttribute()
    {
        // Devolver la fecha de inscripción del usuario
        return $this->usuario->fechainscripcion;
    }

    // Accesor para mostrar el tipo de membresía (más amigable)
    public function getTipoMembresiaAttribute()
    {
        switch ($this->tipo) {
            case 'mensual':
                return 'Mensual';
            case 'trimestral':
                return 'Trimestral';
            case 'anual':
                return 'Anual';
            default:
                return 'Desconocido';
        }
    }

    // Definir un accesor para obtener el estado de la membresía
    public function getEstadoMembresiaAttribute()
    {
        if (now()->greaterThan($this->fecha_fin)) {
            return 'Expirada';
        } else {
            return 'Activa';
        }
    }

    // Accesor para obtener los días restantes de la membresía
    public function getDiasRestantesAttribute()
    {
        // Comprobar si la fecha de fin está definida y no ha pasado
        if ($this->fecha_fin && now()->lessThanOrEqualTo($this->fecha_fin)) {
            // Calcular la diferencia de días
            return now()->diffInDays($this->fecha_fin);
        }

        // Si la fecha ya ha pasado, no hay días restantes
        return 0;
    }
}
