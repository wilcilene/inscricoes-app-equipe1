<?php<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('arquivo');
});

require __DIR__ . '/candidato.php';
use App\Http\Controllers\MinhasInscricoesController;

Route::get('/minhas-inscricoes', [MinhasInscricoesController::class, 'index'])->name('inscricoes.index');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/candidaturas', function () {
    return view('candidaturas');
})->name('candidaturas');

require __DIR__ . '/candidato.php';
use App\Http\Controllers\PerfilController;

Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/perfil', [PerfilController::class, 'store'])->name('perfil.store');