<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Candidato;
use App\Models\Inscricao;

class MinhasInscricoesController extends Controller
{
    public function index()
    {
        $activePage = 'inscricoes';

        $user = Auth::user();
        $perfil = $user ? $user->perfilCandidato : null;
        $endereco = null;
        $inscricoes = collect();

        if ($user) {
            // tentar buscar candidato e inscrições
            $candidato = Candidato::where('usuer_id', $user->id)->first();
            if ($candidato) {
                $inscricoes = Inscricao::where('candidato_id', $candidato->id)->get();
                $endereco = $candidato->enderecos()->first();
            }
        }

        return view('minhasInscricoes', compact('inscricoes', 'activePage', 'user', 'perfil', 'endereco'));
    }
}