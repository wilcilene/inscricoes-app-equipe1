<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;

Route::get('/candidato/cadastro', [CandidatoController::class, 'create'])
    ->name('candidato.cadastro');

Route::post('/candidato/cadastro', [CandidatoController::class, 'salvarEndereco'])
    ->name('candidato.endereco');

Route::get('/candidato/cadastro/credenciais', [CandidatoController::class, 'credenciais'])
    ->name('candidato.credenciais');

Route::post('/candidato/cadastro/finalizar', [CandidatoController::class, 'store'])
    ->name('candidato.store');
Route::get('/candidato/inscricao', [CandidatoController::class, 'inscricao'])
    ->name('candidato.inscricao');

Route::post('/candidato/inscricao', [CandidatoController::class, 'enviarInscricao'])
    ->name('candidato.inscricao.enviar');


Route::middleware(['auth', 'candidato'])->group(function () {
    Route::get('/candidato/dashboard', function () {
        return view('candidato.dashboard');
    });
});