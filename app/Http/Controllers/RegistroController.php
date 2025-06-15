<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    // Muestra el formulario de registro
    public function mostrarFormulario()
    {
        return view('registro');
    }

    // Procesa el formulario de registro
    public function procesarRegistro(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'tipo_usuario' => 'required|in:admin,user',
        ]);

        // Crear el usuario
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'tipo_usuario' => $validated['tipo_usuario'],
        ]);

        return redirect()->route('registro.form')->with('success', 'Usuario registrado correctamente.');
    }
}
