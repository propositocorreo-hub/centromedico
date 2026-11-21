<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    // Muestra el formulario de registro
    public function mostrarFormulario()
    {
        return view('registro');
    }

    // Valida, encripta la clave, crea el usuario, inicia sesión y redirige
    public function registrar(Request $request)
    {
        $datos = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Debes ingresar el nombre del usuario.',
            'email.required' => 'Debes ingresar un correo electrónico.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.unique' => 'Este correo ya está registrado.',
            'password.required' => 'Debes ingresar una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Hash::make() encripta la contraseña de forma segura antes de guardar
        $usuario = User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
        ]);

        // Inicia sesión automáticamente con el usuario recién creado
        Auth::login($usuario);

        // Redirige al dashboard
        return redirect('/dashboard');
    }


    public function mostrarLogin()
    {
        return view('auth.login'); // O la vista 'login' que prefieras
    }


    // Procesa las credenciales e inicia sesión
    public function login(Request $request)
    {
        // 1. Validar los datos del formulario
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Debes ingresar tu correo electrónico.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'password.required' => 'Debes ingresar tu contraseña.',
        ]);

        // 2. Intentar autenticar al usuario con Auth::attempt()
        if (Auth::attempt($credenciales)) {
            // Regenerar la sesión por seguridad contra ataques de fijación
            $request->session()->regenerate();

            // Redirigir al dashboard protegido
            return redirect()->intended('/dashboard');
        }

        // 3. Si la autenticación falla, regresar con un error de credenciales
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
}
