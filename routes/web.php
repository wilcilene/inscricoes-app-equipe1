<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('arquivo');
});

require __DIR__ . '/candidato.php';