<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function mostrarFormulario()
    {
        return view('registro');
    }

    public function procesarRegistro(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            'contrasena' => 'required|min:6|confirmed',
            'tipo_usuario' => 'required|in:admin,user',
        ]);

        // Guardar datos en archivo JSON para simular almacenamiento
        $usuariosFile = storage_path('usuarios.json');
        $usuarios = [];

        if (file_exists($usuariosFile)) {
            $usuarios = json_decode(file_get_contents($usuariosFile), true);
        }

        $usuarios[] = [
            'nombre' => $validated['nombre'],
            'correo' => $validated['correo'],
            'contrasena' => password_hash($validated['contrasena'], PASSWORD_DEFAULT),
            'tipo_usuario' => $validated['tipo_usuario'],
            'fecha_registro' => now()->toDateTimeString(),
        ];

        file_put_contents($usuariosFile, json_encode($usuarios, JSON_PRETTY_PRINT));

        return redirect()->route('registro.form')->with('success', 'Usuario registrado correctamente.');
    }
}

