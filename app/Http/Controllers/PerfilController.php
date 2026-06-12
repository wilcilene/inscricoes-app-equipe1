<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerfilCandidato;

class PerfilController extends Controller
{
    public function index()
    {
        $perfil = PerfilCandidato::find(1) ?? new PerfilCandidato();
        $activePage = 'perfil';

        return view('meuPerfil', compact('perfil', 'activePage'));
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'data_nascimento' => 'required|date',
            'genero' => 'required',
            'naturalidade' => 'required',
            'mae' => 'required',
            'area_atuacao' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
        ]);

        PerfilCandidato::updateOrCreate(['id' => 1], $request->all());

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso!');
    }
}