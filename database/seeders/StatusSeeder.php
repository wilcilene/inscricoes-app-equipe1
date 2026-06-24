<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{

    public function run(): void
    {
         DB::table('inscricao_statuss')->updateOrInsert(
            ['id'=>1],
            ['status'=>'aprovado']
        );
        DB::table('inscricao_statuss')->updateOrInsert(
            ['id'=>2],
            ['status'=>'Rejeitado']
        );
        DB::table('inscricao_statuss')->updateOrInsert(
            ['id'=>3],
            ['status'=>'Pedente']
        );

        DB::table('inscricao_statuss')->updateOrInsert(
            ['id'=>4],
            ['status'=>'Comfirmado']
        );
        DB::table('inscricao_statuss')->updateOrInsert(
            ['id'=>5],
            ['status'=>'Analizado']
        );


    }
}
