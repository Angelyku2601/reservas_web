<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar los campos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'El correo es obligatorio.',
            'email.email' => 'Ingresa un correo válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Intentar iniciar sesión
        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput($request->only('email'))
                ->with('error', 'Correo o contraseña incorrectos.');
        }

        // Evita reutilizar la sesión anterior
        $request->session()->regenerate();

        $user = Auth::user();

        // Redirigir dependiendo del rol
        return match ($user->role) {
            'estudiante' => redirect('/estudiante'),
            'docente' => redirect('/docente'),
            'administrador' => redirect('/administrador'),

            default => redirect('/login')
                ->with('error', 'El usuario no tiene un rol válido.'),
        };
    }
}