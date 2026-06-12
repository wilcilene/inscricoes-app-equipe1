<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/candidaturas', function () {
    // Array de simulação com os dados que o Blade vai ler
    $candidatos = [
        ['id' => 1, 'edital' => '01/2024', 'nome' => 'Gabriela Silva', 'data' => '06/02/2023', 'situacao' => 'Pendente'],
        ['id' => 2, 'edital' => '20/2026', 'nome' => 'Daniela Maria Golçalves Pedrozo', 'data' => '01/09/2025', 'situacao' => 'Aprovado'],
        ['id' => 3, 'edital' => '10/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'situacao' => 'Rejeitado'],
        ['id' => 4, 'edital' => '15/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'situacao' => 'Pendente'],
        ['id' => 5, 'edital' => '44/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'situacao' => 'Pendente'],
        ['id' => 6, 'edital' => '44/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'situacao' => 'Rejeitado'],
        ['id' => 7, 'edital' => '44/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'situacao' => 'Aprovado'],
        ['id' => 8, 'edital' => '44/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'situacao' => 'Rejeitado'],
        ['id' => 9, 'edital' => '15/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'situacao' => 'Pendente'],
        ['id' => 10, 'edital' => '15/2026', 'nome' => 'João Pedro Neiskvy da Silva', 'data' => '29/04/2026', 'situacao' => 'Pendente'],
    ];

    // Envia a lista para a view 'candidaturas' com o nome que ela espera receber
    return view('candidaturas', ['candidatos_simulados' => $candidatos]);
});

