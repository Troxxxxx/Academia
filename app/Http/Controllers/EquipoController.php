<?php
use Illuminate\Http\Request;
use App\Models\Sede;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function cargarEquipos($sede_id)
    {
        // Obtener equipos de una sede específica desde la base de datos
        $sede = Sede::findOrFail($sede_id);
        $equipos = $sede->equipos;

        return view('equipos', compact('equipos', 'sede'));
    }
}