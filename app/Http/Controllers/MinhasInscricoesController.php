<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinhasInscricoesController extends Controller
{
    public function index()
    {
        // Define a página ativa para acender o menu correto na sidebar
        $activePage = 'inscricoes'; 

        // Dados fictícios
        $inscricoes = [
            ['id' => '0001', 'edital' => '01/2024', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '06/02/2023', 'situacao' => 'Pendente', 'classe' => 'pendente'],
            ['id' => '0002', 'edital' => '20/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '01/09/2025', 'situacao' => 'Aprovado', 'classe' => 'aprovado'],
            ['id' => '0003', 'edital' => '10/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '29/04/2026', 'situacao' => 'Rejeitado', 'classe' => 'rejeitado'],
            ['id' => '0004', 'edital' => '15/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '29/04/2026', 'situacao' => 'Pendente', 'classe' => 'pendente'],
            ['id' => '0005', 'edital' => '44/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '29/04/2026', 'situacao' => 'Pendente', 'classe' => 'pendente'],
            ['id' => '0006', 'edital' => '44/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '29/04/2026', 'situacao' => 'Devolvido', 'classe' => 'devolvido'],
            ['id' => '0007', 'edital' => '44/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '29/04/2026', 'situacao' => 'Aprovado', 'classe' => 'aprovado'],
            ['id' => '0008', 'edital' => '44/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '29/04/2026', 'situacao' => 'Rejeitado', 'classe' => 'rejeitado'],
            ['id' => '0009', 'edital' => '15/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '29/04/2026', 'situacao' => 'Pendente', 'classe' => 'pendente'],
            ['id' => '0010', 'edital' => '15/2026', 'descricao' => 'CHAMADA PÚBLICA - DOCENTE', 'cadastro' => '29/04/2026', 'situacao' => 'Pendente', 'classe' => 'pendente'],
        ];

        return view('minhasInscricoes', compact('inscricoes', 'activePage'));
    }
}