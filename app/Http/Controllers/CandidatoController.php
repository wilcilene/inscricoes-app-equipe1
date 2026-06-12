<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CandidatoController extends Controller
{
    // === ETAPA 1: DADOS PESSOAIS ===
    
    public function dadosPessoais()
    {
        return view('candidato.dados-pessoais');
    }

    public function salvarDadosPessoais(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14', // Ajuste conforme sua máscara
            'data_nascimento' => 'required|date',
            'sexo' => 'required|string',
        ]);

        // Armazena na sessão para uso posterior
        session(['dados_pessoais' => $dadosValidados]);

        return redirect()->route('candidato.cadastro');
    }

    // === ETAPA 2: CADASTRO (ENDEREÇO/CONTATO) ===

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
                'cep', 'logradouro', 'numero', 'complemento', 
                'bairro', 'estado', 'cidade', 'telefone', 'celular',
            ])
        ]);

        return redirect()->route('candidato.credenciais');
    }

    // === ETAPA 3: CREDENCIAIS E FINALIZAÇÃO ===

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

        // Recupera os dados das etapas anteriores da sessão
        $dadosPessoais = session('dados_pessoais');
        $dadosEndereco = session('cadastro_endereco');

        // Cria o usuário (Credenciais)
        $user = User::create([
            'name'  => $dadosPessoais['nome'] ?? 'Candidato',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // TODO: Aqui você deve salvar os dados de $dadosPessoais e $dadosEndereco 
        // na tabela 'candidatos' ou 'perfil_candidatos' vinculando ao $user->id.

        // Limpa a sessão após o sucesso
        session()->forget(['dados_pessoais', 'cadastro_endereco']);

        return redirect('/')->with('success', 'Cadastro realizado com sucesso!');
    }

    // === MÉTODOS DE INSCRIÇÃO (MANTIDOS) ===

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