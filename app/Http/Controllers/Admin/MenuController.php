<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use App\Rules\ValidarCampoUrl;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::getMenu();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear()
    {
        return view('admin.menu.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:menu,nombre',
            'url' => 'required|max:100',
            'icono' => 'nullable|max:50'
        ]);

        Menu::create($request->all());
        return redirect('admin/menu/crear')->with('mensaje', 'Menú creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editar(string $id)
    {
        $data = Menu::findOrFail($id);
        return view('admin.menu.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizar(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:menu,nombre,' . $id,
            'url' => ['required', 'max:100', new ValidarCampoUrl],
            'icono' => 'nullable|max:50'
        ]);
        Menu::findOrFail($id)->update($request->all());
        return redirect('admin/menu')->with('mensaje', 'Menú actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function eliminar(string $id)
    {
        Menu::destroy($id);
        return redirect('admin/menu')->with('mensaje', 'Menú eliminado con éxito.');
    }

    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
