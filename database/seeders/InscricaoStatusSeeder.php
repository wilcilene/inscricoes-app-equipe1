<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscricaoStatusSeeder extends Seeder
{
    public function run(): void
    {
        $status = [
            'Pendente',
            'Aprovado',
            'Rejeitado'
        ];

        $dados = [];

        for ($i = 1; $i <= 31; $i++) {

            $dados[] = [
                'id' => $i,
                'status' => $status[array_rand($status)],
                'created_at' => now(),
                'updated_at' => now(),
            ];

        }

        DB::table('inscricao_statuss')->insert($dados);
    }
}