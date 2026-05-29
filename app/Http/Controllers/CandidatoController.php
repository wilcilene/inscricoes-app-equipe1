<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CandidatoController extends Controller
{
    public function create()
    {
        return view('candidato.cadastro');
    }

    public function salvarEndereco(Request $request)
    {
        $request->validate([
            'cep' => 'required|string|max:20',
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'telefone' => 'nullable|string|max:20',
            'celular' => 'required|string|max:20',
        ]);

        session([
            'cadastro_endereco' => $request->only([
                'cep',
                'logradouro',
                'numero',
                'complemento',
                'bairro',
                'estado',
                'cidade',
                'telefone',
                'celular',
            ])
        ]);

        return redirect()->route('candidato.credenciais');
    }

    public function credenciais()
    {
        return view('candidato.credenciais');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|confirmed|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => 'Candidato',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->forget('cadastro_endereco');

        return redirect('/')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function inscricao()
    {
        return view('candidato.inscricao');
    }

    public function enviarInscricao(Request $request)
    {
        $request->validate([
            'vaga' => 'required|string',

            'ficha_inscricao' => 'required|file|mimes:pdf|max:5120',
            'documento_habilitacao' => 'required|file|mimes:pdf|max:5120',

            'curriculo_lattes' => 'nullable|file|mimes:pdf|max:5120',
            'documento_identificacao' => 'nullable|file|mimes:pdf|max:5120',
            'comprovante_ensino_medio' => 'nullable|file|mimes:pdf|max:5120',
            'quitacao_eleitoral' => 'nullable|file|mimes:pdf|max:5120',
            'outros_documentos' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        return redirect()
            ->route('candidato.inscricao')
            ->with('success', 'Inscrição enviada com sucesso!');
    }
}