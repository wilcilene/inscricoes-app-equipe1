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