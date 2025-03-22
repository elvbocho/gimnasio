<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;

    // Definir la tabla que usará este modelo (si no es 'usuarios', por ejemplo)
    protected $table = 'usuarios';

    // Definir qué campos se pueden asignar masivamente (Mass Assignment)
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'contraseña',
        'estado',
        'numero',  // Agregar el nuevo campo aquí
    ];
    

    // Si deseas ocultar ciertos campos (como la contraseña)
    protected $hidden = [
        'contraseña',
    ];

    // Si necesitas que las fechas se conviertan automáticamente a formato de fecha
    protected $dates = [
        'fecha_nacimiento',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

 // app/Models/Usuario.php
public function membresia()
{
    return $this->hasOne(Membresia::class);
}


}


