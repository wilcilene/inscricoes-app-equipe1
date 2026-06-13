<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream

=======
use App\Http\Controllers\Admin\AdminEditalController;
use App\Http\Controllers\CandidatoController;

Route::post('/candidato/endereco', [CandidatoController::class, 'salvarEndereco'])
    ->name('candidato.endereco');

// Página inicial
>>>>>>> Stashed changes
Route::get('/', function () {
    return view('arquivo');
});

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


