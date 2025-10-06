<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rol;
use App\Models\Seguridad\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::orderBy('id')->get();
        return view('admin.usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.usuario.crear', compact('rols'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'usuario' => 'required|max:50|unique:usuario,usuario',
            'nombre' => 'required|max:50',
            'email' => 'required|email|max:100|unique:usuario,email',
            'password' => 'required|min:5',
            're_password' => 'required|same:password',
            'rol_id' => 'required|integer'
        ]);

        $usuario = Usuario::create($request->all());
        $usuario->roles()->attach($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editar(string $id)
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Usuario::with('roles')->findOrFail($id);
        return view('admin.usuario.editar', compact('data', 'rols'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizar(Request $request, string $id)
    {
        $request->validate([
            'usuario' => 'required|max:50|unique:usuario,usuario,' . $id,
            'nombre' => 'required|max:50',
            'email' => 'required|email|max:100|unique:usuario,email,' . $id,
            'password' => 'nullable|min:5',
            're_password' => 'nullable|required_with:password|min:5|same:password',
            'rol_id' => 'required|integer'
        ]);

        Usuario::findOrFail($id)->update(array_filter($request->all()));
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminar(string $id)
    {
        //
    }
}
