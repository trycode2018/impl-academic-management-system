<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Manipula o request e verifica se o utilizador tem a role permitida
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$roles
     * @return Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Verifica se existe utilizador autenticado
        if (! $user) {
            return redirect()->route('login');
        }

        // Verifica se a role do utilizador está permitida
        if (! in_array($user->role, $roles)) {
            abort(403, 'Acesso negado.');
        }

        return $next($request);
    }
}