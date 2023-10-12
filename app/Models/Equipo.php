<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos'; // Reemplaza 'tu_tabla' con el nombre de tu tabla

    protected $fillable = [
        'nombre',
        'sede_id',
        'entrenador',
        'cantidad_jugadores',
    ];

    // Define la relación con la sede
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }
}