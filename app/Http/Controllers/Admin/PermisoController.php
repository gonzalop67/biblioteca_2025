<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permiso::orderBy('id')->get();
        return view('admin.permiso.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear()
    {
        return view('admin.permiso.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:permiso,nombre',
            'slug' => 'required|max:50|unique:permiso,slug',
        ]);

        Permiso::create($request->all());
        return redirect('admin/permiso/crear')->with('mensaje', 'Permiso creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editar(string $id)
    {
        $data = Permiso::findOrFail($id);
        return view('admin.permiso.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizar(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:permiso,nombre,' . $id,
            'slug' => 'required|max:50|unique:permiso,slug,' . $id,
        ]);

        Permiso::findOrFail($id)->update($request->all());
        return redirect('admin/permiso')->with('mensaje', 'Permiso actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                Permiso::destroy($id);
                return response()->json(['mensaje' => 'ok']);
            } catch (\Throwable $e) {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
