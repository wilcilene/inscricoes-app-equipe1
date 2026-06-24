<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;

class CandidaturaController extends Controller
{
    public function show($id)
    {
        $candidatura = Inscricao::with([
            'candidato.user',
            'candidato.endereco',
            'edital',
            'historico.status',
            'ultimoHistorico.status'
        ])->findOrFail($id);

        return view('candidatura-detalhe', compact('candidatura'));
    }
}