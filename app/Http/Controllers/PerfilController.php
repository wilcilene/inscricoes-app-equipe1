<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\User;

class PerfilController extends Controller
{
    public function index()
    {
        // Pega o usuário logado
        $user = Auth::user();
        
        // Pega o candidato ligado a esse usuário (ou cria um em branco se não achar)
        $candidato = $user->candidato ?? new Candidato();
        
        // Pega o endereço ligado ao candidato
        $endereco = $candidato->endereco ?? new Endereco();
        $activePage = 'perfil';

        return view('meuPerfil', compact('user', 'candidato', 'endereco', 'activePage'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $candidato = $user->candidato;

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
        ]);

        // 1. Atualiza o Nome no Usuário
        $user->update(['name' => $request->nome_completo]);

        // 2. Atualiza ou Cria os Dados do Candidato
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

        // 3. Atualiza ou Cria o Endereço
        Endereco::updateOrCreate(
            ['candidato_id' => $candidatoUpdated->id],
            [
                'cep'         => $request->cep,
                'logradouro'  => $request->logradouro,
                'numero_end'  => $request->numero,
                'bairro'      => $request->bairro,
                'complemento' => $request->complemento ?? '',
                'cidade'      => 'Preencher', // Pode ser mapeado dinamicamente depois
                'estado_end'  => $candidatoUpdated->estado ?? 'MG',
                'celular'     => $candidatoUpdated->endereco->celular ?? 'Preencher',
            ]
        );

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }
}