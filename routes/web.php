<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/confirmacao', function () {
    return view('confirmacao');
});

Route::get('/inscricao', function () {
    return view('inscricao');
});