<?php

namespace Database\Seeders;

use App\Models\Seguridad\Usuario;
use Illuminate\Database\Seeder;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = Usuario::create([
            'usuario' => 'admin',
            'nombre' => 'Administrador',
            'email' => 'rgt90@hotmail.com',
            'password' => 'pass123'
        ]);

        $usuario->roles()->sync(1);
    }
}
