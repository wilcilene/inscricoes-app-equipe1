<?php

use Illuminate\Support\Facades\Route;
#candidato
Route::get('/', function () {
    return view('arquivo');
});
#candidato
Route::get('/perfil', function () {
    return view('perfil');
});
#candidato
Route::get('/mural-editais', function () {
    return view('mural-editais');
});
