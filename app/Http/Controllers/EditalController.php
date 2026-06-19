<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use Illuminate\Http\Request;
use App\Models\Inscricao;
use Illuminate\Support\Facades\Auth;

class EditalController extends Controller
{

    private function buscarEditais(Request $request)
    {
        return Edital::filtrar($request->busca)
            ->orderBy('data_fim_inscr')
            ->get();
    }

    public function index(Request $request)
{
    Edital::where('data_fim_inscr','<',now()->subDays(15))->delete();

    $editais = $this->buscarEditais($request);

    $minhasInscricoes = [];

    if (Auth::check()) {
        $minhasInscricoes = Inscricao::where('user_id', Auth::id())
            ->pluck('edital_id')
            ->toArray();
    }

    return view('index', compact('editais', 'minhasInscricoes'));
}

    public function mural(Request $request)
{
    $editais = $this->buscarEditais($request);

    $minhasInscricoes = [];

    if (Auth::check()) {
        $minhasInscricoes = Inscricao::where('candidato_id', Auth::id())
    ->pluck('edital_id')
    ->toArray();
    }

    return view('mural-editais', compact('editais', 'minhasInscricoes'));
}

    public function editar(Request $request)
    {
        $edital = Edital::where('nome', $request->edital)
            ->firstOrFail();

        return view('editar', compact('edital'));
    }

    public function destroy($id)
    {
        Edital::findOrFail($id)->delete();

        return back()->with('sucesso', 'Edital removido');
    }
}