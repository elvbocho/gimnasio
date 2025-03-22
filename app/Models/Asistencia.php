<?php

// app/Models/Asistencia.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $table = 'asistencias';

    protected $fillable = [
        'usuario_id',
        'fecha_hora',
        'metodo_registro',
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    public static function registrar($usuario_id, $metodo)
    {
        return self::create([
            'usuario_id' => $usuario_id,
            'fecha_hora' => now(),
            'metodo_registro' => $metodo,
        ]);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
