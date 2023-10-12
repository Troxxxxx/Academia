<?php

namespace App\Http\Controllers;

use App\Models\JugadorExtranjero;
use Illuminate\Http\Request;

class JugadorExtranjeroController extends Controller
{
    public function index()
    {
        // Obtén los jugadores extranjeros de la base de datos
        $jugadoresExtranjeros = JugadorExtranjero::all();

        // Pasa la variable $jugadoresExtranjeros a la vista
        return view('historia', compact('jugadoresExtranjeros'));
    }
}