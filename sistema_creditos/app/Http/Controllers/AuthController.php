<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function autenticar(Request $request)
    {
        $datos = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt([
            'email' => $datos['email'],
            'password' => $datos['password'],
        ])) {
            return back()
                ->withErrors([
                    'email' => 'El correo o la contraseña son incorrectos.',
                ])
                ->withInput();
        }

        $request->session()->regenerate();

        $usuario = Auth::user();

        if ($usuario->rol === 'admin' || $usuario->rol === 'administrador') {
            return redirect()->route('admin.dashboard');
        }

        if ($usuario->rol === 'cliente') {
            return redirect()->route('cliente.dashboard');
        }

        Auth::logout();

        return back()->withErrors([
            'email' => 'El usuario no tiene un rol válido.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $datos = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $usuario = new User();

        $usuario->name = $datos['name'];
        $usuario->email = $datos['email'];
        $usuario->telefono = $datos['telefono'] ?? null;
        $usuario->rol = 'cliente';
        $usuario->password = Hash::make($datos['password']);

        $usuario->save();

        $partes = preg_split('/\s+/', trim($datos['name']), 2);
        Cliente::create([
            'user_id' => $usuario->id,
            'nombres' => $partes[0],
            'apellidos' => $partes[1] ?? '',
            'documento_identidad' => 'USR-' . $usuario->id,
            'telefono' => $datos['telefono'] ?? null,
            'correo' => $usuario->email,
            'estado' => 'activo',
        ]);

        Auth::login($usuario);

        $request->session()->regenerate();

        return redirect()
            ->route('cliente.dashboard')
            ->with('success', 'Usuario creado correctamente.');
    }

    /*
    |--------------------------------------------------------------------------
    | CERRAR SESIÓN
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
