<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $table = 'estado'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre', 'descripcion' // Lista de columnas que se pueden asignar en masa
    ];
}
