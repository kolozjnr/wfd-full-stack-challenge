<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!$request->user()->hasRole($role)){
            abort(401, 'You dont have access to this page');
        }
        return $next($request);
    }
}