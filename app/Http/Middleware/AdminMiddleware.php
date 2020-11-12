<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if (!backpack_user()->hasAnyRole(['Administrator', 'SchoolManager']))
            return response(trans('backpack::base.unauthorized'), 401);
        return $next($request);
    }
}
