<?php

namespace Database\Seeders;

use App\Models\Candidato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidato::Create([
        'cpf' => 10484648900,
        'data_nascimento'=> 2000-05-14,
        'user_id'=> 2,
        'mae'=> 'ipui oji9u',
        'pai'=> 'kjo jjoi',
        'area_atuacao'=> '~çlkjphiouyf',
        'genero'=> 'M',
        'estado'=> 'SC',
    ]);
    }
}
