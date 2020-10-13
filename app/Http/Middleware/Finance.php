<?php

namespace App\Http\Middleware;

use Closure;

class Finance
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
        $allowed_group = [3];

        if(!in_array(Auth::user()->group_id, $allowed_group)){
            if($request->wantsJson()){
                return response()->json(['message' => 'Akses tidak diizinkan'], 403);
            }

            return redirect()->route('home')->with(['error' => 'Akses tidak diizinkan']);
        }

        return $next($request);
    }
}
