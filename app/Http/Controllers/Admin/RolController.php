<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Rol;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Rol::orderBy('id')->get();
        return view('admin.rol.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear()
    {
        return view('admin.rol.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:rol,nombre'
        ]);

        Rol::create($request->all());
        return redirect('admin/rol')->with('mensaje', 'Rol creado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editar(string $id)
    {
        $data = Rol::findOrFail($id);
        return view('admin.rol.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizar(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:rol,nombre,' . $id
        ]);

        Rol::findOrFail($id)->update($request->all());
        return redirect('admin/rol')->with('mensaje', 'Rol actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                Rol::destroy($id);
                return response()->json(['mensaje' => 'ok']);
            } catch (\Throwable $e) {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
