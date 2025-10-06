<?php

use Database\Seeders\TablaMenuRolSeeder;
use Database\Seeders\TablaMenuSeeder;
use Database\Seeders\TablaPermisoRolSeeder;
use Database\Seeders\TablaPermisoSeeder;
use Database\Seeders\TablaRolSeeder;
use Database\Seeders\UsuarioAdministradorSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'menu',
            'permiso',
            'rol',
            'menu_rol',
            'permiso_rol',
            'usuario',
            'usuario_rol'
        ]);
        $this->call(TablaRolSeeder::class);
        $this->call(TablaMenuSeeder::class);
        $this->call(TablaMenuRolSeeder::class);
        $this->call(TablaPermisoSeeder::class);
        $this->call(TablaPermisoRolSeeder::class);
        $this->call(UsuarioAdministradorSeeder::class);
    }

    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}