<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Inscricao;

class InscricaoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $perfil = $user ? $user->perfilCandidato : null;
        $endereco = session('cadastro_endereco', null);

        $inscricoes = collect();
        if ($user) {
            try {
                $inscricoes = DB::table('inscricaos')
                    ->join('candidatos', 'inscricaos.candidato_id', '=', 'candidatos.id')
                    ->where('candidatos.usuer_id', $user->id)
                    ->select('inscricaos.*')
                    ->get();
            } catch (\Throwable $e) {
                $inscricoes = collect();
            }
        }

        $activePage = "minhas-inscricoes";
        return view('minhasInscricoes', compact('inscricoes', 'activePage', 'user', 'perfil', 'endereco'));
    }

    /**
     * Download a file attached to an inscricao.
     */
    public function download($id, $field)
    {
        $inscricao = Inscricao::find($id);
        if (! $inscricao) {
            abort(404);
        }

        $map = [
            'ficha' => 'caminho_ficha_inscricao',
            'identidade' => 'caminho_identidade',
            'diploma' => 'caminho_diploma',
            'curriculo' => 'caminho_curriculo_lattes',
            'comprovante' => 'caminho_comprovante_eleitoral',
            'militar' => 'caminho_certificado_militar',
            'outros' => 'outros_documentos',
        ];

        if (! isset($map[$field])) {
            abort(404);
        }

        $col = $map[$field];
        $path = $inscricao->$col;
        if (! $path || ! Storage::disk('public')->exists($path)) {
            abort(404);
        }

        return Storage::disk('public')->download($path);
    }
}
