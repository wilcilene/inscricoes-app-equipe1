<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PerfilCandidato;
use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Inscricao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

        $user = User::create([
            'name' => $request->input('name', 'Candidato'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // criar perfil (se houver dados)
        $perfilData = $request->only(['cpf', 'telefone']);
        if (!empty($perfilData['cpf']) || !empty($perfilData['telefone'])) {
            PerfilCandidato::create([
                'user_id' => $user->id,
                'cpf' => $perfilData['cpf'] ?? null,
                'telefone' => $perfilData['telefone'] ?? null,
            ]);
        }

        // criar candidato básico
        $candidato = Candidato::create([
            'cpf' => $request->input('cpf', $perfilData['cpf'] ?? null),
            'data_nascimento' => $request->input('data_nascimento', null),
            'usuer_id' => $user->id,
            'mae' => $request->input('mae', null),
            'pai' => $request->input('pai', null),
            'area_atuacao' => $request->input('area_atuacao', null),
            'genero' => $request->input('genero', 'O'),
            'estado' => $request->input('estado', 'MG'),
        ]);

        // salvar endereço vindo da sessão (fluxo de cadastro existente)
        $enderecoSessao = session('cadastro_endereco');
        if ($enderecoSessao && $candidato) {
            Endereco::create([
                'cep' => $enderecoSessao['cep'] ?? null,
                'logradouro' => $enderecoSessao['logradouro'] ?? null,
                'numero_end' => $enderecoSessao['numero'] ?? null,
                'complemento' => $enderecoSessao['complemento'] ?? null,
                'bairro' => $enderecoSessao['bairro'] ?? null,
                'estado_end' => $enderecoSessao['estado'] ?? null,
                'cidade' => $enderecoSessao['cidade'] ?? null,
                'telefone' => $enderecoSessao['telefone'] ?? null,
                'celular' => $enderecoSessao['celular'] ?? null,
                'candidato_id' => $candidato->id,
            ]);
        }

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
            'edital_id' => 'required|integer',

            // aceitar PDF e imagens (jpg/png)
            'ficha_inscricao' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'documento_habilitacao' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'curriculo_lattes' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'documento_identificacao' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'comprovante_ensino_medio' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'quitacao_eleitoral' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'outros_documentos' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $user = auth()->user();

        // tentar localizar candidato relacionado ao usuário
        $candidato = null;
        if ($user) {
            $candidato = Candidato::where('usuer_id', $user->id)->first();
        }

        // prevenir inscrições duplicadas para o mesmo edital
        $editalId = $request->input('edital_id');
        if ($candidato && $editalId) {
            $exists = Inscricao::where('candidato_id', $candidato->id)
                ->where('edital_id', $editalId)
                ->exists();
            if ($exists) {
                return redirect()
                    ->route('candidato.inscricao')
                    ->with('error', 'Você já possui uma inscrição neste edital.');
            }
        }

        // armazenar arquivos em storage/app/public/inscricoes
        $paths = [];
        $files = [
            'ficha_inscricao' => 'caminho_ficha_inscricao',
            'documento_habilitacao' => 'caminho_diploma',
            'curriculo_lattes' => 'caminho_curriculo_lattes',
            'documento_identificacao' => 'caminho_identidade',
            'comprovante_ensino_medio' => 'caminho_comprovante_eleitoral',
            'quitacao_eleitoral' => 'caminho_comprovante_eleitoral',
            'outros_documentos' => 'outros_documentos',
        ];

        foreach ($files as $input => $col) {
            if ($request->hasFile($input)) {
                $paths[$col] = $request->file($input)->store('inscricoes', 'public');
            }
        }

        $inscricao = Inscricao::create([
            'caminho_ficha_inscricao' => $paths['caminho_ficha_inscricao'] ?? null,
            'caminho_identidade' => $paths['caminho_identidade'] ?? null,
            'caminho_diploma' => $paths['caminho_diploma'] ?? null,
            'caminho_curriculo_lattes' => $paths['caminho_curriculo_lattes'] ?? null,
            'caminho_comprovante_eleitoral' => $paths['caminho_comprovante_eleitoral'] ?? null,
            'caminho_certificado_militar' => $paths['caminho_certificado_militar'] ?? null,
            'vaga_pcd' => $request->has('vaga_pcd') ? 1 : 0,
            'vaga_pniq' => $request->has('vaga_pniq') ? 1 : 0,
            'edital_id' => $request->input('edital_id', null),
            'candidato_id' => $candidato ? $candidato->id : null,
        ]);

        return redirect()
            ->route('candidato.inscricao')
            ->with('success', 'Inscrição enviada com sucesso!');
    }
}