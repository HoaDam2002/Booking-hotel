<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \Auth;


class checkMemberLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if( Auth::check() && Auth::user()->level == 0 ){
            return $next($request);
        }else{
            return redirect('/login/user')->with('pleaseLogin','Please login to use this function');
        }
    }
}