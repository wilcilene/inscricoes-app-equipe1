
<?php

use Illuminate\Support\Facades\Route;
#telas do kalleb <
#candidato
Route::get('/', function () {
    return view('login');
});
#candidato
Route::get('/inscricao', function () {
    return view('inscricao');
});
#telas do kalleb >

#telas da gabi <
#candidato
Route::get('/perfil', function () {
    return view('perfil');
});

#candidato
Route::get('/mural-editais', function () {
    return view('mural-editais');
});
#telas da gabi >

#telas luan <
Route::get('/arquivo', function () {
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
#telas luan >