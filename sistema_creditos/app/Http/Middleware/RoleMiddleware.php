<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Si no ha iniciado sesión
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $usuario = auth()->user();

        // Permitir cualquiera de los roles indicados
        if (!in_array($usuario->rol, $roles, true)) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
