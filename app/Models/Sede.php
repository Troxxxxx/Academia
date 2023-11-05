<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sede extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si no sigue la convención de nombres de Laravel
    protected $table = 'sedes';

    // Desactiva los timestamps si no los necesitas (created_at y updated_at)
    public $timestamps = false;

    // Especifica los campos que quieres que sean asignables en masa
    protected $fillable = [
        'numero', // Supongo que esto debería ser 'nombre'
        'direccion',
        'telefono', // Revisa tus campos, parece que hay un error tipográfico aquí
        'email',
        'descripcion',
        // No necesitas incluir los campos de timestamp aquí
    ];

    public function sedes()
    {
        return $this->belongsTo(Sede::class, 'identificacion');
    }


    // Si quieres utilizar los campos de timestamp, asegúrate de que los nombres de los campos en la base de datos son 'created_at' y 'updated_at'
    // Si no, puedes especificar nombres personalizados para estos campos
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}