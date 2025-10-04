<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermisoAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->permiso())
            return $next($request);

        return redirect('/')->withErrors(['error' => 'Usted no tiene permiso para entrar aquí']);
    }

    private function permiso()
    {
        return session()->get('rol_nombre') == 'administrador';
    }
}
