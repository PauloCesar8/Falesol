<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAccountType
{
    public function handle($request, Closure $next, $type)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($type == 'user' && $user->conta == 1) {
                return $next($request);
            } elseif ($type == 'employee' && $user->conta == 2) {
                return $next($request);
            }
        }

        return redirect('/'); // Redireciona para a página inicial se o usuário não tiver permissão
    }
}