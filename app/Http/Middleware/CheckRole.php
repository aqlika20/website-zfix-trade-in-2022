<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role_id)
    {
        if (in_array($request->user()->roles_id, $role_id)) {
            return $next($request);
        }
        
        return redirect('/');
    }
}
