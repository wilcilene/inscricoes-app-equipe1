<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;

// === FLUXO DE CADASTRO EM 3 ETAPAS ===

// Etapa 1: Dados Pessoais
Route::get('/candidato/dados-pessoais', [CandidatoController::class, 'dadosPessoais'])
    ->name('candidato.dados-pessoais');

Route::post('/candidato/dados-pessoais', [CandidatoController::class, 'salvarDadosPessoais'])
    ->name('candidato.salvar-dados');

// Etapa 2: Cadastro (Endereço e Contato)
Route::get('/candidato/cadastro', [CandidatoController::class, 'create'])
    ->name('candidato.cadastro');

Route::post('/candidato/cadastro', [CandidatoController::class, 'salvarEndereco'])
    ->name('candidato.endereco');

// Etapa 3: Credenciais (Finalização)
Route::get('/candidato/cadastro/credenciais', [CandidatoController::class, 'credenciais'])
    ->name('candidato.credenciais');

Route::post('/candidato/cadastro/finalizar', [CandidatoController::class, 'store'])
    ->name('candidato.store');


// === FLUXO DE INSCRIÇÃO EM EDITAIS ===

Route::get('/candidato/inscricao', [CandidatoController::class, 'inscricao'])
    ->name('candidato.inscricao');

Route::post('/candidato/inscricao', [CandidatoController::class, 'enviarInscricao'])
    ->name('candidato.inscricao.enviar');


// === ÁREA LOGADA DO CANDIDATO ===

Route::middleware(['auth', 'candidato'])->group(function () {
    Route::get('/candidato/dashboard', function () {
        return view('candidato.dashboard');
    })->name('candidato.dashboard');
});