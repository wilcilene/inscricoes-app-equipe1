<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('arquivo');
});

require __DIR__ . '/candidato.php';
use App\Http\Controllers\MinhasInscricoesController;

Route::get('/minhas-inscricoes', [MinhasInscricoesController::class, 'index'])->name('inscricoes.index');