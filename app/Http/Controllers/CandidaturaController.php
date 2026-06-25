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

        // ADMIN acessa tudo
        if (auth()->user()->tipo_usuario_id == 1) {
            return view('candidatura-detalhe', compact('candidatura'));
        }

        // CANDIDATO só acessa o dele
        $candidato = \App\Models\Candidato::where('user_id', auth()->id())
            ->firstOrFail();

        if ($candidatura->candidato_id !== $candidato->id) {
            abort(403, 'Acesso negado');
        }

        return view('candidatura-detalhe', compact('candidatura'));
    }
}