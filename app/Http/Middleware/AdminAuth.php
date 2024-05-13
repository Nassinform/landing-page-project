<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié
        if (Auth::check()) {
            return $next($request);
        } else {
            // Redirige l'utilisateur non authentifié vers la page de connexion
            return redirect()->route('getAdminAuth');
        }

        // Redirige l'utilisateur en cas de rôle non autorisé
        return abort(403);
    }
}
