<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaPermisoRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisoRols = [
            array('rol_id' => '2', 'permiso_id' => '1'),
            array('rol_id' => '2', 'permiso_id' => '2')
        ];
        DB::table('permiso_rol')->insert($permisoRols);
    }
}
