<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use App\Models\Inscricao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditalController extends Controller
{
    private function buscarEditais(Request $request)
    {
        return Edital::filtrar($request->busca)
            ->withCount('inscricoes')
            ->orderBy('data_fim_inscr')
            ->get();
    }

    private function minhasInscricoes()
    {
        if (!Auth::check()) {
            return [];
        }

        return Inscricao::where(
                'candidato_id',
                Auth::id()
            )
            ->pluck('edital_id')
            ->toArray();
    }

    public function index(Request $request)
    {


        $editais = $this->buscarEditais($request);

        $minhasInscricoes =
            $this->minhasInscricoes();

        return view(
            'index',
            compact(
                'editais',
                'minhasInscricoes'
            )
        );
    }

    public function mural(Request $request)
    {
        $editais =
            $this->buscarEditais($request);

        $minhasInscricoes =
            $this->minhasInscricoes();

        return view(
            'mural-editais',
            compact(
                'editais',
                'minhasInscricoes'
            )
        );
    }

    public function editar(Request $request)
    {
        $edital = Edital::where(
            'nome',
            $request->edital
        )->firstOrFail();

        return view(
            'editar',
            compact('edital')
        );
    }

    public function destroy($id)
    {
        $edital =
            Edital::findOrFail($id);

        $edital->delete();

        return back()->with(
            'sucesso',
            'Edital removido'
        );
    }
}