<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscricao;
use App\Models\Edital;
use App\Models\Candidato;

class InscricaoSeeder extends Seeder
{
    public function run(): void
    {
        $editais = Edital::all();
        $candidatos = Candidato::all();

        if ($editais->isEmpty() || $candidatos->isEmpty()) {
            return;
        }

        foreach ($editais as $edital) {



            for ($i = 0; $i < 1; $i++) {


                Inscricao::create([
                    'edital_id' => $edital->id,
                    'candidato_id' => 1,

                    // arquivos fictícios
                    'caminho_ficha_inscricao' => 'docs/ficha.pdf',
                    'caminho_identidade' => 'docs/rg.pdf',
                    'caminho_diploma' => 'docs/diploma.pdf',
                    'caminho_curriculo_lattes' => 'docs/lattes.pdf',
                    'caminho_comprovante_eleitoral' => 'docs/eleitoral.pdf',
                    'caminho_certificado_militar' => 'docs/militar.pdf',

                    // vagas (simulação simples)
                    'vaga_pcd' => rand(0, 1),
                    'vaga_pniq' => rand(0, 1),
                ]);
            }
        }
    }
}