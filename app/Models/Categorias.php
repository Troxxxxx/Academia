<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre', // Lista de columnas que se pueden asignar en masa
    ];
}
