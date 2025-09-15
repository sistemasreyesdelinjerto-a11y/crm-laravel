<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nombre', 'apellido', 'puesto', 'departamento', 'fecha_ingreso',
        'estatus', 'telefono', 'fecha_nacimiento', 'direccion', 'identificacion',
        'emergencia_nombre', 'emergencia_telefono', 'notas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
