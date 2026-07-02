<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Edital;
use Illuminate\Http\Request;

class AdminEditalController extends Controller {
    
    public function index() {
        $editais = Edital::latest()->get();
        return view('admin.editais.index', compact('editais'));
    }
    
    public function create() {
        return view('admin.editais.create');
    }
    
    public function store(Request $request) {
        $dados = $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required',
            'data_inicio_inscr' => 'required|date',
            'data_fim_inscr' => 'required|date|after_or_equal:data_inicio_inscr',
            'data_inicio_rev' => 'required|date|after_or_equal:data_fim_inscr',
            'data_fim_rev' => 'required|date|after_or_equal:data_inicio_rev'
        ]);
        
        Edital::create($dados);
        return redirect()->route('admin.editais.index')->with('success', 'Edital criado com sucesso!');
    }
    
    public function edit(Edital $edital) {
        return view('admin.editais.edit', compact('edital'));
    }
    
    public function update(Request $request, Edital $edital) {
        $dados = $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required',
            'data_inicio_inscr' => 'required|date',
            'data_fim_inscr' => 'required|date|after_or_equal:data_inicio_inscr',
            'data_inicio_rev' => 'required|date|after_or_equal:data_fim_inscr',
            'data_fim_rev' => 'required|date|after_or_equal:data_inicio_rev'
        ]);
        
        $edital->update($dados);
        return redirect()->route('admin.editais.index')->with('success', 'Edital atualizado com sucesso!');
    }
    
    public function destroy(Edital $edital) {
        $edital->delete();
        return back()->with('success', 'Edital removido!');
    }
}