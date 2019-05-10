<?php

namespace App\Http\Middleware;

use Closure;

class MustLogin
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

        if($request->get('account') == 111){
            return $next($request);
        }else return redirect('/dologin');

    }
}
