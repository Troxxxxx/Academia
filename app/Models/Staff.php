<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'imagen',
        'nombre',
        'equipo_id',
        'cargo',
        'telefono',
    ];

    // Relación con el modelo Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
}