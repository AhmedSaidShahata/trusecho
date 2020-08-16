<?php

namespace App\Http\Middleware;

use Closure;

class verify_is_admin
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
        if(!auth()->user()->is_admin()){

            return redirect(route('user.homepages.index'));
        }
        return $next($request);
    }
}
