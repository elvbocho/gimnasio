<?php

// app/Models/Notificacion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla en la base de datos
    protected $table = 'notificaciones';

    // Especificamos los campos que son asignables
    protected $fillable = [
        'usuario_id',
        'tipo',
        'mensaje',
        'fecha_envio',
        'estado',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
