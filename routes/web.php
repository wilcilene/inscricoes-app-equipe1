<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MinhasInscricoesController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CandidatoController;





//-----------------ROTAS PÚBLICAS

// Tela inicial
Route::get('/', function () {
    return view('login');
});

// Tela de login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Processar autenticação
Route::post(
    '/login',
    [LoginController::class, 'login']
)->name('login.autenticar');

// LOGOUT
Route::post(
    '/logout',
    function () {

        Auth::logout();

        request()
            ->session()
            ->invalidate();

        request()
            ->session()
            ->regenerateToken();

        return redirect('/login');

    }

)->name('logout');

// Cadastro
Route::get('/inscricao', function () {
    return view('inscricao');
});


//-------------ÁREA CANDIDATO

Route::middleware([
    'auth',
    'candidato'
])->group(function () {

    // Página de teste
    Route::get('/candidato', function () {
        return view('mural-editais');
    })->name('candidato.dashboard');


    // Perfil
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::post('/perfil', [PerfilController::class, 'store'])->name('perfil.store');


    // Editais
    Route::get('/mural-editais', function () {
        return view('mural-editais');
    })->name('mural.editais');


    // Arquivos
    Route::get('/arquivo', function () {
        return view('arquivo');
    })->name('arquivo');


    // Minhas inscrições
    Route::get(
        '/minhas-inscricoes',
        [MinhasInscricoesController::class, 'index']
    )->name('inscricoes.index');


    Route::get(
        '/minhas-inscricoes/{id}',
        function ($id) {

            return view(
                'minhas-inscricoes-detalhe',
                [
                    'id' => $id
                ]
            );

        }

    )->name(
        'minhas-inscricoes.detalhe'
    );

});


//-------------ÁREA ADMIN

Route::middleware([
    'auth',
    'admin'
])->group(function () {

    // Página de teste
    Route::get('/admin', function () {
        return view('admintest');
    })->name('admin.dashboard');


    // Candidaturas
    Route::get(
        '/candidaturas',
        function () {

            return view(
                'candidaturas'
            );

        }

    )->name(
        'candidaturas'
    );


    Route::get(
        '/candidaturas/{id}',
        function ($id) {

            return view(
                'candidatura-detalhe',
                [
                    'id' => $id
                ]
            );

        }

    )->name(
        'candidaturas.detalhe'
    );

});



//----------- ETAPA 1 - DADOS PESSOAIS

Route::get(
    '/candidato/dados',
    [CandidatoController::class, 'dadosPessoais']
)->name('candidato.dados');

Route::post(
    '/candidato/dados',
    [CandidatoController::class, 'salvarDadosPessoais']
)->name('candidato.dados.salvar');

//----------------- ETAPA 2 - ENDEREÇO

Route::get(
    '/candidato/cadastro',
    [CandidatoController::class, 'create']
)->name('candidato.cadastro');

Route::post(
    '/candidato/endereco',
    [CandidatoController::class, 'salvarEndereco']
)->name('candidato.endereco');
//--------- ETAPA 3 - CREDENCIAIS

Route::get(
    '/candidato/credenciais',
    [CandidatoController::class, 'credenciais']
)->name('candidato.credenciais');

Route::post(
    '/candidato/store',
    [CandidatoController::class, 'store']
)->name('candidato.store');

//-----------------INSCRIÇÃO

Route::get(
    '/candidato/inscricao',
    [CandidatoController::class, 'inscricao']
)->name('candidato.inscricao');

Route::post(
    '/candidato/inscricao',
    [CandidatoController::class, 'enviarInscricao']
)->name('candidato.inscricao.enviar');

//-----------------ROTAS EXTERNAS

require __DIR__ . '/candidato.php';