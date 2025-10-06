<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();
        $rols = [
            array('id' => '1', 'nombre' => 'administrador', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre' => 'editor', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'nombre' => 'supervisor', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('rol')->insert($rols);
    }
}
