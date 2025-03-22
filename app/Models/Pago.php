<?php

// app/Models/Pago.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla en la base de datos
    protected $table = 'pagos';

    // Especificamos los campos que son asignables
    protected $fillable = [
        'usuario_id',
        'monto',
        'fecha_pago',
        'metodo_pago',
        'estado',
    ];

    // Relación con el modelo Usuario (un pago pertenece a un usuario)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
