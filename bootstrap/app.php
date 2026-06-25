<?php

use App\Http\Middleware\NoCache;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(
    basePath: dirname(__DIR__)
)

->withRouting(
    web: __DIR__.'/../routes/web.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)

->withMiddleware(function (Middleware $middleware): void {

    $middleware->alias([

        'admin' =>
        \App\Http\Middleware\AdminMiddleware::class,

        'candidato' =>
        \App\Http\Middleware\CandidatoMiddleware::class,

    ]);

})

->withMiddleware(function ($middleware) {
    $middleware->alias([
        'nocache' => NoCache::class,
    ]);
})

->withExceptions(function (Exceptions $exceptions): void {

    //

})

->create();



