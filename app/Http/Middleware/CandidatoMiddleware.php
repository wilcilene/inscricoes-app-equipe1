<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CandidatoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
{
    if (
        auth()->check()
        &&
        auth()->user()->tipo_usuario_id == 2
    ) {
        return $next($request);
    }

    abort(403);
}
}
