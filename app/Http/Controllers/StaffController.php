<?php
namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff', compact('staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|image',
            'equipo_id' => 'required|integer|exists:equipos,id',
            'cargo' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:255',
        ]);

        $staffMember = new Staff($request->all());
        
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('images/staff');
            $staffMember->imagen = $path;
        }

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
            $path = $request->file('imagen')->store('images/staff');
            $staffMember->imagen = $path;
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