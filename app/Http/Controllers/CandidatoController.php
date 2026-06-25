<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidato;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CandidatoController extends Controller
{
    // --------ETAPA 1 - DADOS PESSOAIS

    public function dadosPessoais()
    {
        return view('candidato.dados-pessoais');
    }

    

public function salvarDadosPessoais(Request $request)
{
    $dadosValidados = $request->validate([
        'nome_completo' => 'required|string|max:255',

        'cpf' => [
            'required',
            'string',
            'max:14',
            Rule::unique('candidatos', 'cpf')
        ],

        'data_nascimento' => 'required|date',
        'genero' => 'required|in:M,F,NB,O',
        'mae' => 'required|string|max:255',
        'pai' => 'nullable|string|max:255',
        'area_profissional' => 'required|string|max:255',
    ], [
        'cpf.unique' => 'Este CPF já está cadastrado no sistema.'
    ]);

    session([
        'dados_pessoais' => $dadosValidados
    ]);

    return redirect()->route('candidato.cadastro');
}

     // --------ETAPA 2 - ENDEREÇO

    public function create()
    {
        return view('candidato.cadastro');
    }

    public function salvarEndereco(Request $request)
    {
        $dadosValidados = $request->validate([
            'cep'         => 'required|string|max:20',
            'logradouro'  => 'required|string|max:255',
            'numero'      => 'required|string|max:20',
            'complemento' => 'nullable|string|max:255',
            'bairro'      => 'required|string|max:255',
            'estado'      => 'required|string|max:2',
            'cidade'      => 'required|string|max:255',
            'telefone'    => 'nullable|string|max:20',
            'celular'     => 'required|string|max:20',
        ]);

        session([
            'cadastro_endereco' => $dadosValidados
        ]);

        return redirect()->route('candidato.credenciais');
    }

     // -------------- ETAPA 3 - CREDENCIAIS

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

        $dadosPessoais = session('dados_pessoais');
        $dadosEndereco = session('cadastro_endereco');

        if (!$dadosPessoais || !$dadosEndereco) {
            return redirect()
                ->route('candidato.dados')
                ->withErrors([
                    'erro' => 'Sessão expirada. Refaça o cadastro.'
                ]);
        }

         // ---------------------- USERS

       $user = User::create([
    'name' => $dadosPessoais['nome_completo'],
    'email' => $request->email,
    'password' => Hash::make($request->password),

    // candidato
    'tipo_usuario_id' => 2,
]);

         // -------- CANDIDATOS

        $candidato = Candidato::create([
            'cpf' => $dadosPessoais['cpf'],
            'data_nascimento' => $dadosPessoais['data_nascimento'],
            'user_id' => $user->id,
            'mae' => $dadosPessoais['mae'],
            'pai' => $dadosPessoais['pai'] ?? '',
            'area_atuacao' => $dadosPessoais['area_profissional'],
            'genero' => $dadosPessoais['genero'],
            'estado' => $dadosEndereco['estado'],
        ]);

         // ------------- ENDEREÇOS

        Endereco::create([
            'cep' => $dadosEndereco['cep'],
            'logradouro' => $dadosEndereco['logradouro'],
            'numero_end' => $dadosEndereco['numero'],
            'complemento' => $dadosEndereco['complemento'] ?? '',
            'bairro' => $dadosEndereco['bairro'],
            'estado_end' => $dadosEndereco['estado'],
            'cidade' => $dadosEndereco['cidade'],
            'telefone' => $dadosEndereco['telefone'] ?? '',
            'celular' => $dadosEndereco['celular'],
            'candidato_id' => $candidato->id,
        ]);

         // ------------ LIMPA A SESSION

        session()->forget([
            'dados_pessoais',
            'cadastro_endereco'
        ]);

        return redirect('/')
            ->with('success', 'Cadastro realizado com sucesso!');
    }

    // ------------- INSCRIÇÃO

    public function inscricao()
    {
        return view('candidato.inscricao');
    }

   
}