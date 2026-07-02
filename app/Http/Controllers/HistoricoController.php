<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\HistoricoInscricao;

class HistoricoController extends Controller
{
    public function formRejeitar($id)
    {
        $candidatura = Inscricao::findOrFail($id);

        return view(
            'motivo_rejeitado',
            compact('candidatura')
        );
    }


    public function rejeitar(Request $request, $id)
    {
        $request->validate([
            'motivo' => 'required|string|min:5'
        ]);

        HistoricoInscricao::create([
            'inscricao_id' => $id,
            'inscricao_status_id' => 2, // Rejeitado
            'observacao' => $request->motivo,
        ]);

        return redirect()
            ->route('candidaturas')
            ->with('success', 'Candidatura rejeitada com sucesso.');
    }

    public function aprovar($id)
    {
        $candidatura = Inscricao::findOrFail($id);

        HistoricoInscricao::create([
            'inscricao_id' => $id,
            'inscricao_status_id' => 1,
            'observacao' => 'Submissão Completa',
        ]);

        return redirect()->route('candidaturas')->with('success', 'Candidatura aprovada com sucesso!');
    }
    public function reset($id)
    {
        HistoricoInscricao::create([
            'inscricao_id' => $id,
            'inscricao_status_id' => 3,
            'observacao' => 'Retornado para revisão',
        ]);
        return redirect()->route('minhas-inscricoes.detalhe', $id)->with('success', 'Candidatura Enviada para analize');
    }
}
