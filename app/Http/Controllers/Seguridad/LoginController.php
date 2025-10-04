<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('seguridad.index');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required|max:16',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            $roles = Auth::user()->roles()->where('estado', 1)->get();
            if ($roles->isNotEmpty()) {
                Auth::user()->setSession($roles->toArray());
            }else{
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('seguridad/login')->withErrors(['error' => 'Este usuario no tiene un rol activo']);
            }

            return redirect()->route('inicio');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Las credenciales introducidas son incorrectas.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('inicio');
    }
}
