<?php

namespace App\Http\Middleware\Permissions;

use Closure;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (!$request->user()->can(strtolower($permission))) {
            abort(404);
        }
        return $next($request);
    }
}
