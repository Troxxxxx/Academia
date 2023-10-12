<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.body.footer'); // Asegúrate de que la vista esté en la ubicación correcta
    }
}
