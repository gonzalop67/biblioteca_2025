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
            'usuario' => 'required|min:4|max:16',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            //return redirect()->route('ninjas.index');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Las credenciales introducidas son incorrectas.'
        ]);
    }
}
