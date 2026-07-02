<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Candidato;
use Carbon\Carbon;

class DocumentoController extends Controller
{
    public function visualizar(
        Inscricao $inscricao,
        string $campo
    ) {

        $camposPermitidos = [
            'caminho_ficha_inscricao',
            'caminho_identidade',
            'caminho_diploma',
            'caminho_curriculo_lattes',
            'caminho_comprovante_eleitoral',
            'caminho_certificado_militar',
        ];

        if (!in_array($campo, $camposPermitidos)) {
            abort(404);
        }

        $usuario = Auth::user();

        $ehAdmin = $usuario->tipo_usuario_id == 1;

        $ehDono = false;

        if ($inscricao->candidato) {
            $ehDono =
                $inscricao->candidato->user_id ==
                $usuario->id;
        }

        if (!$ehAdmin && !$ehDono) {
            abort(403);
        }

        /*
        | Nome do arquivo salvo no banco
        */

        $arquivoBanco = $inscricao->$campo;

        if (!$arquivoBanco) {
            abort(404, 'Documento não encontrado.');
        }

        /*
        | Monta o caminho correto
        */

        $nomeArquivo = basename($arquivoBanco);

        $arquivo = 'inscricao_' . $inscricao->id . '/' . $nomeArquivo;

        /*
        | Verifica existência
        */

        if (!Storage::disk('docs')->exists($arquivo)) {

            abort(
                404,
                'Arquivo não encontrado: ' . $arquivo
            );
        }

        /*
        | Exibe arquivo
        */

        return response()->file(
            Storage::disk('docs')->path($arquivo)
        );
    }
    public function update(Request $request, Inscricao $inscricao, string $campo)
    {
        /*| Campos permitidos*/
        $camposPermitidos = [
            'caminho_ficha_inscricao',
            'caminho_identidade',
            'caminho_diploma',
            'caminho_curriculo_lattes',
            'caminho_comprovante_eleitoral',
            'caminho_certificado_militar',
        ];

        if (!in_array($campo, $camposPermitidos)) {
            abort(404);
        }

        /*| Autenticação e permissão*/
        $usuario = Auth::user();

        $ehAdmin = $usuario->tipo_usuario_id == 1;

        $candidato = Candidato::where('user_id', $usuario->id)->firstOrFail();

        $ehDono = $inscricao->candidato_id === $candidato->id;

        if (!$ehAdmin && !$ehDono) {
            abort(403);
        }

        /*| Regra de negócio (EDITÁVEL ou não)*/
        $status = strtolower($inscricao->status->status ?? 'pendente');

        $agora = Carbon::now();

        $dentroRevisao = $agora->between(
            $inscricao->edital->data_inicio_rev,
            $inscricao->edital->data_fim_rev
        );

        //  bloqueio: aprovado nunca edita
        if ($status === 'aprovado') {
            return back()->with('erro', 'Inscrição já aprovada não pode ser alterada.');
        }

        //  bloqueio: fora do prazo (exceto rejeitado)
        if ($status !== 'rejeitado' && !$dentroRevisao) {
            return back()->with('erro', 'Fora do período de revisão.');
        }

        /*| Upload*/
        $request->validate([
            'documento' => 'required|file|mimes:pdf,jpg,png|max:5120',
        ]);

        $path = $request->file('documento')->store('inscricoes', 'docs');

        /*| Atualiza campo dinâmico*/
        $inscricao->$campo = $path;
        $inscricao->save();

        return back()->with('sucesso', 'Documento atualizado com sucesso!');
    }
}
