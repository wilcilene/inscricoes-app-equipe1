<?php

use Illuminate\Support\Facades\Route;

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


