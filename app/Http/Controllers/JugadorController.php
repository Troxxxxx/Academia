<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede;
use App\Models\Equipo;
use App\Models\Jugador;

class JugadorController extends Controller
{
    public function index()
    {
        $sedes = Sede::all();
        return view('jugadores', compact('sedes'));
    }

    public function getEquipos(Request $request, $sede_id)
    {
        $equipos = Equipo::where('sede_id', $sede_id)->get();
        return response()->json($equipos);
    }

    public function getJugadores(Request $request, $equipo_id)
    {
        $jugadores = Jugador::where('equipo_id', $equipo_id)->get();
        return response()->json($jugadores);
    }

    public function getTodos() 
{
    $jugadores = Jugador::orderBy('id', 'asc')->get();
    return response()->json($jugadores);
}

    
}