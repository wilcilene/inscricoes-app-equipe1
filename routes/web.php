<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CandidatoController;

/* Route::get('/', [MuralController::class, 'index'])->name('mural');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('editais', AdminEditalController::class);
});
*/
Route::post('/candidato/endereco', [CandidatoController::class, 'salvarEndereco'])
    ->name('candidato.endereco');

// Página inicial
Route::get('/', function () {
    return view('login');
});

// Perfil
Route::get('/perfil', function () {
    return view('perfil');
});

// Arquivo
Route::get('/arquivo', function () {
    return view('arquivo');
});

// Confirmação
Route::get('/confirmacao', function () {
    return view('confirmacao');
});

// Inscrição
Route::get('/inscricao', function () {
    return view('inscricao');
});
