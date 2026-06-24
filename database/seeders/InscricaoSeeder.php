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

            $candidato = $candidatos->random();

            Inscricao::create([

                'edital_id' => $edital->id,
                'candidato_id' => 1,

                'caminho_ficha_inscricao'       => 'docs/test.pdf',
                'caminho_identidade'            => 'docs/test.pdf',
                'caminho_diploma'               => 'docs/test.pdf',
                'caminho_curriculo_lattes'      => 'docs/test.pdf',
                'caminho_comprovante_eleitoral' => 'docs/test.pdf',
                'caminho_certificado_militar'   => 'docs/test.pdf',

                'vaga_pcd' => rand(0, 1),
                'vaga_pniq' => rand(0, 1),

            ]);
        }
    }
}