<?php
namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Equipo;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        $equipos = Equipo::all(); // Obtén todos los equipos
      return view('staff', compact('staff', 'equipos'));
    }

    public function store(Request $request)
{
    // Validación de la solicitud
    $request->validate([
        'nombre' => 'required|string|max:255',
        'imagen' => 'required|image',
        'equipo_id' => 'required|integer|exists:equipos,id',
        'cargo' => 'nullable|string|max:255',
        'telefono' => 'nullable|string|max:255',
    ]);

    $staffMember = new Staff;

    if ($request->hasFile('imagen')) {
        // Guarda la imagen en el disco 'public' y guarda la ruta relativa en la base de datos.
        // La función 'store' devuelve la ruta relativa.
        $path = $request->file('imagen')->store('staff', 'public'); // 'staff' es la carpeta dentro de 'storage/app/public'
        $staffMember->imagen = $path; // 'staff/nombre_del_archivo.ext'
    }

    $staffMember->nombre = $request->nombre;
    $staffMember->equipo_id = $request->equipo_id;
    $staffMember->cargo = $request->cargo;
    $staffMember->telefono = $request->telefono;

    $staffMember->save();

    return redirect()->route('staff.index')->with('success', 'Miembro del equipo agregado exitosamente');
}

    public function update(Request $request, $id)
    {
        $staffMember = Staff::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|image',
            'equipo_id' => 'required|integer|exists:equipos,id',
            'cargo' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('imagen')) {
            // Almacenar la imagen en el disco 'public' y guardar la ruta relativa en la base de datos.
            // La función 'store' devuelve la ruta relativa.
            $path = $request->file('imagen')->store('public/staff');
            // 'public/staff' es la carpeta donde se almacenan las imágenes, no se incluye en la ruta de la base de datos.
            $staffMember->imagen = str_replace('public/', '', $path);
        }

        $staffMember->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Miembro del equipo actualizado exitosamente');
    }

    public function destroy($id)
    {
        $staffMember = Staff::findOrFail($id);
        $staffMember->delete();

        return redirect()->route('staff.index')->with('success', 'Miembro del equipo eliminado exitosamente');
    }
}