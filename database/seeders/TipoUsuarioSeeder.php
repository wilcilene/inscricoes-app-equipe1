<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Alimenta a tabela tipo_usuario com dados iniciais.
     */
    public function run(): void
    {
        // Insere os tipos com IDs fixos conforme solicitado
        DB::table('tipo_usuarios')->updateOrInsert(
            ['id' => 1],
            ['tipo_usuario' => 'admin', 'created_at' => now(), 'updated_at' => now()]
        );

        DB::table('tipo_usuarios')->updateOrInsert(
            ['id' => 2],
            ['tipo_usuario' => 'candidato', 'created_at' => now(), 'updated_at' => now()]
        );
    }
}