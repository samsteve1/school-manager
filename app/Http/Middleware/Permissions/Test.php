<?php

namespace App\Http\Middleware\Permissions;

use Closure;

class Test
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

        dd($request->user());

        $response = $next($request);
        return $response;
    }
}
