<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Support\Facades\Auth;

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

        $arquivo = $inscricao->$campo;

        if (!$arquivo) {
            abort(404);
        }

        return response()->file(
            storage_path('app/' . $arquivo)
        );
    }
}