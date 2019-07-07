<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RoleAdminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return $next($request);
        }

        return redirect('/administrativo')->with('error', 'Página não encontrada!');
    }
}
