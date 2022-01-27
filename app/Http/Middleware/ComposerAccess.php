<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ComposerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() AND auth()->user()->access_level_enum == 'COMPOSER'){
            return $next($request);
        }

        dd('Acesso negado! Você não é um compositor.');
    }
}
