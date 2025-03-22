<?php

// app/Models/RutinaUsuario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutinaUsuario extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla en la base de datos
    protected $table = 'rutinas_usuarios';

    // Especificamos los campos que son asignables
    protected $fillable = [
        'usuario_id',
        'rutina_id',
        'fecha_envio',
        'estado',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relación con el modelo RutinaEntrenamiento
    public function rutina()
    {
        return $this->belongsTo(RutinaEntrenamiento::class);
    }
}
