<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscricao;
use App\Models\HistoricoInscricao;
use Carbon\Carbon;

class HistoricoInscricaoSeeder extends Seeder
{
    public function run(): void
    {
        $inscricoes = Inscricao::all();

        foreach ($inscricoes as $inscricao) {

            // Data inicial aleatória
            $base = Carbon::now()
                ->subDays(rand(10, 60))
                ->subHours(rand(0, 23))
                ->subMinutes(rand(0, 59));

            // Confirmação da inscrição
            HistoricoInscricao::create([
                'inscricao_id' => $inscricao->id,
                'inscricao_status_id' => 4, // Confirmado
                'observacao' => 'Inscrição enviada pelo candidato.',
                'created_at' => $base,
                'updated_at' => $base,
            ]);

            // Análise (1 a 5 dias depois)
            $analise = $base->copy()
                ->addDays(rand(1, 5))
                ->addHours(rand(1, 12))
                ->addMinutes(rand(0, 59));

            HistoricoInscricao::create([
                'inscricao_id' => $inscricao->id,
                'inscricao_status_id' => 5, // Analizado
                'observacao' => 'Inscrição em análise pela comissão.',
                'created_at' => $analise,
                'updated_at' => $analise,
            ]);

            // Resultado final (2 a 10 dias após análise)
            $resultado = $analise->copy()
                ->addDays(rand(2, 10))
                ->addHours(rand(1, 8))
                ->addMinutes(rand(0, 59));

            if (rand(0, 1)) {

                HistoricoInscricao::create([
                    'inscricao_id' => $inscricao->id,
                    'inscricao_status_id' => 1, // Aprovado
                    'observacao' => 'Candidato aprovado na seleção.',
                    'created_at' => $resultado,
                    'updated_at' => $resultado,
                ]);

            } else {

                HistoricoInscricao::create([
                    'inscricao_id' => $inscricao->id,
                    'inscricao_status_id' => 2, // Rejeitado
                    'observacao' => 'Candidato não aprovado após análise por falta de documentos.',
                    'created_at' => $resultado,
                    'updated_at' => $resultado,
                ]);
            }
        }
    }
}
