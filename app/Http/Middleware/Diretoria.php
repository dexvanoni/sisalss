<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Diretoria
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->perfil > 1) {
            return redirect()
                    ->route('home')
                    ->with('negado', 'Você não tem acesso a este módulo do sistema! Consulte um Diretor da ALSS.');
        }
        return $next($request);
    }
}
