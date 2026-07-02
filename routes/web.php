<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\NoCache;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MinhasInscricoesController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EditalController;
use App\Http\Controllers\CandidaturaController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\InscreverController;

// ROTAS PÚBLICAS

// Página inicial
Route::get(
    '/',
    [
        EditalController::class,
        'index'
    ]
)->name('home');


// Route::get(
//     '/',
//     function () {
//         return view('cad_editais');
//     }
// );

// Login
Route::get(
    '/login',
    function () {
        return view('login');
    }
)->name('login');


// Autenticação
Route::post(
    '/login',
    [
        LoginController::class,
        'login'
    ]
)->name('login.autenticar');


// Logout
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


// Inscrição pública
Route::get(
    '/inscricao',
    function () {
        return view('inscricao');
    }
);



Route::middleware('auth')->group(function () {

    Route::get(
        '/documento/{inscricao}/{campo}',
        [DocumentoController::class, 'visualizar']
    )->name('documento.visualizar');
});

// ÁREA CANDIDATO

Route::middleware([
    'auth',
    'candidato'
])



    ->group(function () {


        // Dashboard
        Route::get(
            '/candidato',
            [
                EditalController::class,
                'mural'
            ]
        )->name(
            'candidato.dashboard'
        );


        // Perfil
        Route::get(
            '/perfil',
            [
                PerfilController::class,
                'index'
            ]
        )->name(
            'perfil.index'
        );


        Route::post(
            '/perfil',
            [
                PerfilController::class,
                'store'
            ]
        )->name(
            'perfil.store'
        );


        // Mural
        Route::get(
            '/mural-editais',
            [
                EditalController::class,
                'mural'
            ]
        )->name(
            'mural.editais'
        );


        // Arquivos
        Route::get(
            '/arquivo',
            function () {

                return view(
                    'arquivo'
                );
            }
        )->name(
            'arquivo'
        );
        // Minhas inscriçoes
        Route::get(
            '/MinhasInscricoes',
            [
                EditalController::class,
                'candidaturas'
            ]
        )->name(
            'MinhasInscricoes'
        );

        //Inscrever
        Route::post(
            '/candidato/inscricao',
            [InscreverController::class, 'enviarInscricao']
        )->name('candidato.inscricao.enviar');

        // Tela inscrição
        Route::get(
            '/inscrever',
            function () {

                return view(
                    'inscricao'
                );
            }
        )->name(
            'inscrever'
        );


        // Detalhe inscrição

        Route::get(
            '/minhas-inscricoes/{id}',
            [CandidaturaController::class, 'show']
        )->name('minhas-inscricoes.detalhe');

        Route::put('/documento/{inscricao}/{campo}', [DocumentoController::class, 'update'])
            ->name('documento.editar');

        Route::put('/candidatura/{id}/reset', [HistoricoController::class, 'reset'])
            ->name('candidatura.reset');
    });



// ÁREA ADMIN

Route::middleware([
    'auth',
    'admin'
])->group(function () {


    Route::get(
        '/candidaturas/exportar',
        [EditalController::class, 'exportar']
    )->name('candidaturas.exportar');

    // Dashboard
    Route::get(
        '/admin',
        [
            EditalController::class,
            'mural'
        ]
    )->name(
        'admin.dashboard'
    );


    // Candidaturas
    Route::get(
        '/candidaturas',
        [
            EditalController::class,
            'candidaturas'
        ]
    )->name(
        'candidaturas'
    );


    // Detalhe candidatura
    Route::get('/candidaturas/{id}', [CandidaturaController::class, 'show'])
        ->name('candidaturas.detalhe');




    // Cadastro edital
    Route::get(
        '/admin/editais/cadastrar',
        function () {

            return view(
                'cad_editais'
            );
        }
    )->name(
        'admin.editais.cadastrar'
    );


    // Editar edital
    Route::get('/admin/editais/{id}/editar', function ($id) {

        $edital = \App\Models\Edital::findOrFail($id);

        return view('cad_editais', compact('edital'));
    })->name('admin.editais.editar');


    // Excluir edital
    Route::delete(
        '/admin/editais/{id}',
        [
            EditalController::class,
            'destroy'
        ]
    )->name(
        'admin.editais.excluir'
    );

    Route::post('/editais', [EditalController::class, 'store'])
        ->name('edital.store');

    Route::put('/editais/{id}', [EditalController::class, 'update'])
        ->name('edital.update');

    Route::post(
        '/historico/rejeitar/{id}',
        [HistoricoController::class, 'rejeitar']
    )->name('historico.rejeitar');

    Route::get(
        '/motivo/{id}',
        [HistoricoController::class, 'formRejeitar']
    )->name('historico.formRejeitar');

    Route::put('/candidaturas/{id}/aprovar', [HistoricoController::class, 'aprovar'])
        ->name('candidaturas.aprovar');
});


// CADASTRO


// Dados pessoais
Route::get(
    '/candidato/dados',
    [
        CandidatoController::class,
        'dadosPessoais'
    ]
)->name(
    'candidato.dados'
);


Route::post(
    '/candidato/dados',
    [
        CandidatoController::class,
        'salvarDadosPessoais'
    ]
)->name(
    'candidato.dados.salvar'
);


// Endereço
Route::get(
    '/candidato/cadastro',
    [
        CandidatoController::class,
        'create'
    ]
)->name(
    'candidato.cadastro'
);


Route::post(
    '/candidato/endereco',
    [
        CandidatoController::class,
        'salvarEndereco'
    ]
)->name(
    'candidato.endereco'
);


// Credenciais
Route::get(
    '/candidato/credenciais',
    [
        CandidatoController::class,
        'credenciais'
    ]
)->name(
    'candidato.credenciais'
);


Route::post(
    '/candidato/store',
    [
        CandidatoController::class,
        'store'
    ]
)->name(
    'candidato.store'
);


// INSCRIÇÃO


Route::get(
    '/candidato/inscricao',
    [
        CandidatoController::class,
        'inscricao'
    ]
)->name(
    'candidato.inscricao'
);





// EDITAIS


Route::get(
    '/editais',
    [
        EditalController::class,
        'index'
    ]
)->name(
    'editais'
);



Route::delete(
    '/editais/{id}',
    [
        EditalController::class,
        'destroy'
    ]
)->name(
    'edital.destroy'
);



// ROTAS EXTERNAS

require __DIR__ . '/candidato.php';
=======

use App\Http\Controllers\CandidatoController;

Route::post('/candidato/endereco', [CandidatoController::class, 'salvarEndereco'])
    ->name('candidato.endereco');

// Página inicial
//<<<<<<< livia
//>>>>>>> Stashed changes
//=======
//>>>>>>> main
Route::get('/', function () {
    return view('login');
});

// Perfil
Route::get('/perfil', function () {
    return view('perfil');
});

//Rota do mural.
//Route::get('/mural', [MuralController::class, 'index'])
//->name('Mural');

//Rotas do admin.
Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('editais', AdminEditalController::class);
});


>>>>>>> main
