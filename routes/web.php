	<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinhasInscricoesController;
use App\Http\Controllers\PerfilController;

# telas do kalleb <
# candidato
Route::get('/', function () {
    return view('login');
});

# candidato
Route::get('/inscricao', function () {
    return view('inscricao');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
# telas do kalleb >

# telas da gabi <
# candidato
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil.index');
Route::post('/perfil', [PerfilController::class, 'store'])->name('perfil.store');

# candidato
Route::get('/mural-editais', function () {
    return view('mural-editais');
});
# telas da gabi >

# telas luan <
Route::get('/arquivo', function () {
    return view('arquivo');
});

Route::get('/minhas-inscricoes', [MinhasInscricoesController::class, 'index'])->name('inscricoes.index');
# telas luan >

# telas felipe/admin <
Route::get('/candidaturas', function () {
    return view('candidaturas');
})->name('candidaturas');

Route::get('/candidaturas/{id}', function ($id) {
    return view('candidatura-detalhe', ['id' => $id]);
})->name('candidaturas.detalhe');
# telas felipe/admin >

Route::get('/minhas-inscricoes/{id}', function ($id) {
    return view('minhas-inscricoes-detalhe', ['id' => $id]);
})->name('minhas-inscricoes.detalhe');

require __DIR__ . '/candidato.php';