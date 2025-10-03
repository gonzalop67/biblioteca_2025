<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = "usuario";
    protected $remember_token = false;
    protected $fillable = ['usuario', 'nombre', 'password'];
}
