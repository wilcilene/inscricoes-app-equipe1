<?php

use Illuminate\Support\Facades\Route;
<<<<<<< refs/remotes/origin/Kalleb---Laravel-com-tela-de-login-e-inscrição-ok
#candidato
Route::get('/', function () {
    return view('arquivo');
=======

Route::get('/', function () {
    return view('login');
>>>>>>> local
});
#candidato
Route::get('/perfil', function () {
    return view('perfil');
});
<<<<<<< refs/remotes/origin/Kalleb---Laravel-com-tela-de-login-e-inscrição-ok
=======

Route::get('/confirmacao', function () {
    return view('confirmacao');
});

Route::get('/inscricao', function () {
    return view('inscricao');
});
>>>>>>> local
