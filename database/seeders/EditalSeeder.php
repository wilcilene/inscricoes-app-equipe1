<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Edital;
use Carbon\Carbon;

class EditalSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 769; $i <= 856; $i++) {

            $inicio = Carbon::create(2026, 5, 1)->addDays(($i - 769) * 7);

            Edital::create([
                'nome' => "{$i}/2026",
                'area' => "Edital institucional{$i}/2026",
                'descricao' => "Descrição do edital {$i}/2026 para processo seletivo e cadastro reserva.",
                'data_inicio_inscr' => $inicio,
                'data_fim_inscr' => $inicio->copy()->addDays(15),
                'data_inicio_rev' => $inicio->copy()->addDays(20),
                'data_fim_rev' => $inicio->copy()->addDays(30),
            ]);
        }
    }
}