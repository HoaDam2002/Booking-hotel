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
        if (Auth::check() && Auth::user()->level == 0) {
            return $next($request);
        } else {
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $host = $_SERVER['HTTP_HOST'];
            $uri = $_SERVER['REQUEST_URI'];

            $currentURL = $protocol . $host . $uri;
            session()->put('url', $currentURL);
            return redirect('/login/user')->with('pleaseLogin', 'Please login to use this function');
        }
    }
}
