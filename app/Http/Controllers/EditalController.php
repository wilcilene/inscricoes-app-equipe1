<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use App\Models\Inscricao;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EditalController extends Controller
{

public function exportar()
{
    $arquivo = 'candidaturas.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=$arquivo",
    ];

    $callback = function () {

        $csv = fopen('php://output', 'w');

        fputcsv($csv, [
            'ID',
            'Edital',
            'Nome',
            'Data Cadastro',
            'Status'
        ]);

        Inscricao::with([
            'edital',
            'candidato'
        ])->chunk(100, function ($inscricoes) use ($csv) {

            foreach ($inscricoes as $item) {

                fputcsv($csv, [
                    $item->id,
                    $item->edital->nome,
                    $item->candidato->user->name ?? 'Sem nome',
                    $item->created_at->format('d/m/Y'),
                    $item->status
                ]);

            }

        });

        fclose($csv);
    };

    return response()->stream(
        $callback,
        200,
        $headers
    );
}

    public function candidaturas()
{
   $inscricoes = Inscricao::with([
    'candidato.user',
    'edital',
    'status'
])->paginate(10);

    return view(
        'candidaturas',
        compact(
            'inscricoes'
        )
    );
}
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

        $candidato = Candidato::where(
            'user_id',
            Auth::id()
        )->first();

        if (!$candidato) {
            return [];
        }

        return Inscricao::where(
            'candidato_id',
            $candidato->id
        )
            ->pluck('edital_id')
            ->toArray();
    }

    public function index(Request $request)
    {
        $editais = $this->buscarEditais($request);

        $minhasInscricoes = $this->minhasInscricoes();

        return view(
            'index',
            compact('editais', 'minhasInscricoes')
        );
    }

    public function mural(Request $request)
    {
        $editais = $this->buscarEditais($request);

        $minhasInscricoes = $this->minhasInscricoes();

        return view(
            'mural-editais',
            compact('editais', 'minhasInscricoes')
        );
    }

    public function update(Request $request, $id)
    {
        $edital = Edital::findOrFail($id);
        $dataInicioRev = Carbon::parse($request->data_fim_inscr)->addDays(2);

        $dataFimRev = $dataInicioRev->copy()->addDays(15);



        $edital->update([
            'nome' => $request->titulo,
            'descricao' => $request->descricao,
            'resumo' => $request->resumo,
            'data_inicio_inscr' => $request->data_inicio_inscr,
            'data_fim_inscr' => $request->data_fim_inscr,
            'data_inicio_rev' => $dataInicioRev,
            'data_fim_rev' => $dataFimRev,
        ]);

        
    return redirect()
    ->route('admin.dashboard')
    ->with(
        'sucesso',
        "Edital {$edital->nome} atualizado com sucesso."
    );
    }

    public function store(Request $request)

    {
        $dataInicioRev = Carbon::parse($request->data_fim_inscr)->addDays(2);

        $dataFimRev = $dataInicioRev->copy()->addDays(15);

        Edital::create([
            'nome' => $request->titulo,
            'descricao' => $request->descricao,
            'resumo' => $request->resumo,
            'data_inicio_inscr' => $request->data_inicio_inscr,
            'data_fim_inscr' => $request->data_fim_inscr,
            'data_inicio_rev' => $dataInicioRev,
            'data_fim_rev' => $dataFimRev,
        ]);

        return redirect()
    ->route('admin.dashboard')
    ->with(
        'sucesso',
        "Edital {$request->titulo} cadastrado com sucesso."
    );
    }

    public function destroy($id)
    {
        $edital = Edital::findOrFail($id);

        if ($edital->inscricoes()->exists()) {
            return back()->with('erro', 'Não é possível excluir este edital porque já existem inscrições.');
        }

        $edital->delete();

        return back()->with(
            'sucesso',
            'Edital removido com sucesso.'
        );
    }

    public function form($id = null)
    {
        $edital = null;

        if ($id) {
            $edital = Edital::findOrFail($id);
        }

        return view('cad_editais', compact('edital'));
    }
}
