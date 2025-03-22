<?php

// app/Models/RutinaEntrenamiento.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutinaEntrenamiento extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla en la base de datos
    protected $table = 'rutinas_entrenamiento';

    // Especificamos los campos que son asignables
    protected $fillable = [
        'nombre',
        'descripcion',
        'nivel',
    ];
}
