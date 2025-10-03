<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class MenuRolController extends Controller
{
    public function index()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $menus = Menu::getMenu();
        $menusRols = Menu::with('roles')->get()->pluck('roles', 'id')->toArray();
        return view('admin.menu-rol.index', compact('rols', 'menus', 'menusRols'));
    }

    public function guardar(Request $request)
    {
        //
    }
}
