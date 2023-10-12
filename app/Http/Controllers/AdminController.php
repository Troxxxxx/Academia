<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Método para Cerrar sesión o Logout
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Usuario salió satisfactoriamente',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    }

    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    } // End Method 

    public function EditProfile()
    {

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    } // End Method 

    //Este método cambia el nombre del usuario y otros datos que agregaremos más adelante
    //Este método cambia el nombre del usuario y otros datos que agregaremos más adelante
    public function ChangeProfileData(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->created_at = $request->created_at;

        $data->save();

        $notification = array(
            'message' => 'Los datos del perfil de usuario se actualizaron satisfactoriamente',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    // End Method

    public function ChangePassword()
    {

        return view('admin.admin_change_password');
    } // End Method

    public function UpdatePassword(Request $request)
    {

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Contraseña actualizada Satisfactoriamente');
            return redirect()->back();
        } else {
            session()->flash('message', 'la contraseña actual no coincide');
            return redirect()->back();
        }
    } // End Method

    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->profile_image = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'La imagen del perfil se actualizó satisfactoriamente',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile')->with($notification);
    } // End Method

}