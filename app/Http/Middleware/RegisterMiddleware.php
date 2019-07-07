<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Parameter;

class RegisterMiddleware{

    public function handle($request, Closure $next, $role = null, $permission = null){
        
        return redirect()->route('login');

        // return $next($request);
    }

}