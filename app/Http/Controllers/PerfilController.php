<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidato;
use App\Models\Endereco;

class PerfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $candidato = $user->candidato ?? new Candidato();
        $endereco = $candidato->endereco ?? new Endereco();
        $activePage = 'perfil';

        return view('meuPerfil', compact('user', 'candidato', 'endereco', 'activePage'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $dadosValidados = $request->validate([
            'nome_completo'   => 'required|string|max:255',
            'cpf'             => 'required|string|max:14',
            'data_nascimento' => 'required|date',
            'genero'          => 'required|in:M,F,NB,O',
            'mae'             => 'required|string|max:255',
            'pai'             => 'nullable|string|max:255',
            'area_atuacao'    => 'required|string|max:255',
            'cep'             => 'required|string|max:20',
            'logradouro'      => 'required|string|max:255',
            'numero'          => 'required|string|max:20',
            'bairro'          => 'required|string|max:255',
            'complemento'     => 'nullable|string|max:255',
            'cidade'          => 'required|string|max:255',
            'estado_end'      => 'required|string|max:2',
            'telefone'        => 'nullable|string|max:20',
            'celular'         => 'required|string|max:20',
        ]);

        $user->update(['name' => $request->nome_completo]);

        $candidatoUpdated = Candidato::updateOrCreate(
            ['user_id' => $user->id],
            [
                'cpf'             => $request->cpf,
                'data_nascimento' => $request->data_nascimento,
                'mae'             => $request->mae,
                'pai'             => $request->pai ?? '',
                'area_atuacao'    => $request->area_atuacao,
                'genero'          => $request->genero,
            ]
        );

        Endereco::updateOrCreate(
            ['candidato_id' => $candidatoUpdated->id],
            [
                'cep'         => $request->cep,
                'logradouro'  => $request->logradouro,
                'numero_end'  => $request->numero,
                'bairro'      => $request->bairro,
                'complemento' => $request->complemento ?? '',
                'cidade'      => $request->cidade,
                'estado_end'  => $request->estado_end,
                'telefone'    => $request->telefone ?? '',
                'celular'     => $request->celular,
            ]
        );

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }
}