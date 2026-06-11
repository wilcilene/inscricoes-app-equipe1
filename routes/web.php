<?php<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('arquivo');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/candidaturas', function () {
    return view('candidaturas');
})->name('candidaturas');

require __DIR__ . '/candidato.php';