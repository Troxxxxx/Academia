<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'descripcion',
    ];

    // Relación con la tabla de equipos
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipos_id');
    }
}