<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipo_usuarios')->updateOrInsert(
            ['id'=>1],
            ['tipo_usuario'=>'admin']
        );

        DB::table('tipo_usuarios')->updateOrInsert(
            ['id'=>2],
            ['tipo_usuario'=>'candidato']
        );
    }
}