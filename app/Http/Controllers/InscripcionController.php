<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion; // Asegúrate de importar el modelo necesario

class InscripcionController extends Controller
{
    // Método para mostrar el formulario de inscripción
    public function create()
    {
        return view('inscripciones');
    }

    // Método para almacenar la inscripción en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:inscripciones',
            'telefono' => 'required|string|max:20',
            'sede' => 'required|string',
            'mensaje' => 'nullable|string',
        ]);

        // Crear una nueva instancia de Inscripcion (ajusta el nombre del modelo según tu aplicación)
        $inscripcion = new Inscripcion();
        $inscripcion->nombre = $request->input('nombre');
        $inscripcion->correo = $request->input('correo');
        $inscripcion->telefono = $request->input('telefono');
        $inscripcion->sede = $request->input('sede');
        $inscripcion->mensaje = $request->input('mensaje');

        // Guardar la inscripción en la base de datos
        $inscripcion->save();

        // Redireccionar a una página de confirmación o mostrar un mensaje de éxito
        return redirect('/')->with('success', 'Inscripción exitosa. ¡Gracias por unirte a nuestra academia de baloncesto!');
    }
}
