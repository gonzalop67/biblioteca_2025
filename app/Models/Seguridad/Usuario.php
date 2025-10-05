<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Rol;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Usuario extends Authenticatable
{
    protected $table = "usuario";
    protected $remember_token = false;
    protected $fillable = ['usuario', 'nombre', 'email', 'password'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    public function setSession($roles)
    {
        if (count($roles) == 1){
            Session::put([
                'rol_id' => $roles[0]['id'],
                'rol_nombre' => $roles[0]['nombre'],
                'usuario' => Auth::user()->usuario,
                'usuario_id' => Auth::user()->id,
                'nombre_usuario' => Auth::user()->nombre
            ]);
        }
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
}
