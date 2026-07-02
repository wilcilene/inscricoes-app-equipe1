<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidato;
use App\Models\Inscricao;
use App\Models\HistoricoInscricao;

class InscreverController extends Controller
{
    public function enviarInscricao(Request $request)
    {
        $request->validate([
            'edital_id' => 'required|integer',

            'ficha_inscricao' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'documento_habilitacao' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'curriculo_lattes' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'documento_identificacao' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'comprovante_ensino_medio' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'quitacao_eleitoral' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'outros_documentos' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $candidato = Candidato::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        // Evita inscrição duplicada
        $jaInscrito = Inscricao::where(
            'edital_id',
            $request->edital_id
        )
            ->where(
                'candidato_id',
                $candidato->id
            )
            ->exists();

        if ($jaInscrito) {
            return back()->withErrors([
                'erro' => 'Você já possui uma inscrição neste edital.'
            ]);
        }
        $tipoVaga = $request->input('tipo_vaga');
        // Cria a inscrição
        $inscricao = Inscricao::create([
            'edital_id'     => $request->edital_id,
            'candidato_id'  => $candidato->id,
            'caminho_ficha_inscricao' => '',
            'caminho_identidade' => '',
            'caminho_diploma' => '',
            'caminho_curriculo_lattes' => '',
            'caminho_comprovante_eleitoral' => '',
            'caminho_certificado_militar' => '',
            'vaga_pcd' => $tipoVaga === 'pcd' ? 1 : 0,
            'vaga_pniq' => $tipoVaga === 'pniq' ? 1 : 0,

        ]);

        HistoricoInscricao::create([
            'inscricao_id' => $inscricao->id,
            'inscricao_status_id' => 4,
            'observacao' => 'Inscrição enviada pelo candidato.'
        ]);

        // Pasta exclusiva da inscrição
        $pasta = 'inscricao_' . $inscricao->id;

        /*
        |--------------------------------------------------------------------------
        | Ficha de inscrição
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('ficha_inscricao')) {

            $ext = $request
                ->file('ficha_inscricao')
                ->getClientOriginalExtension();

            $inscricao->caminho_ficha_inscricao =
                $request->file('ficha_inscricao')
                ->storeAs(
                    $pasta,
                    "ficha_inscricao.$ext",
                    'docs'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Documento de identificação
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('documento_identificacao')) {

            $ext = $request
                ->file('documento_identificacao')
                ->getClientOriginalExtension();

            $inscricao->caminho_identidade =
                $request->file('documento_identificacao')
                ->storeAs(
                    $pasta,
                    "identidade.$ext",
                    'docs'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Habilitação / Diploma
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('documento_habilitacao')) {

            $ext = $request
                ->file('documento_habilitacao')
                ->getClientOriginalExtension();

            $inscricao->caminho_diploma =
                $request->file('documento_habilitacao')
                ->storeAs(
                    $pasta,
                    "diploma.$ext",
                    'docs'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Currículo Lattes
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('curriculo_lattes')) {

            $ext = $request
                ->file('curriculo_lattes')
                ->getClientOriginalExtension();

            $inscricao->caminho_curriculo_lattes =
                $request->file('curriculo_lattes')
                ->storeAs(
                    $pasta,
                    "curriculo_lattes.$ext",
                    'docs'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Quitação Eleitoral
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('quitacao_eleitoral')) {

            $ext = $request
                ->file('quitacao_eleitoral')
                ->getClientOriginalExtension();

            $inscricao->caminho_comprovante_eleitoral =
                $request->file('quitacao_eleitoral')
                ->storeAs(
                    $pasta,
                    "quitacao_eleitoral.$ext",
                    'docs'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Certificado Militar
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('comprovante_ensino_medio')) {

            $ext = $request
                ->file('comprovante_ensino_medio')
                ->getClientOriginalExtension();

            $inscricao->caminho_certificado_militar =
                $request->file('comprovante_ensino_medio')
                ->storeAs(
                    $pasta,
                    "ensino_medio.$ext",
                    'docs'
                );
        }

        $inscricao->save();



        return redirect()
            ->route('candidato.dashboard')
            ->with(
                'success',
                'Inscrição realizada com sucesso!'
            );
    }
}
