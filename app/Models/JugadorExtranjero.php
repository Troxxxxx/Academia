<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JugadorExtranjero extends Model
{
    use HasFactory;
    
    // Si tu tabla no sigue el convenio de nombres de Laravel, debes especificar el nombre de la tabla
    protected $table = 'jugadores_extranjeros';
    
    // Si tu clave primaria no es 'id', debes especificar la clave primaria de la tabla
    // protected $primaryKey = 'id';

    // Si tu tabla no tiene los timestamps created_at y updated_at, descomenta la siguiente línea
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagen',
        'nuevo_destino',
        'nacionalidad',
        'posicion',
        'estatura',
        'edad',
        'descripcion_carrera',
    ];
}