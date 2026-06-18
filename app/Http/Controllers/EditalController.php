<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use Illuminate\Http\Request;

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

        return view('index', compact('editais'));
    }

    public function mural(Request $request)
    {
        $editais = $this->buscarEditais($request);

        return view('mural-editais', compact('editais'));
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