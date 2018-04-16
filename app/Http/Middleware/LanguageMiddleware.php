<?php

namespace App\Http\Middleware;

use Closure;
use Lang;
use Session;
use App;

class LanguageMiddleware
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
        if (!Session::has('lang')){
            Session::put('lang', App::getLocale());
        }
        Lang::setLocale(Session::get('lang'));

        return $next($request);
    }
}
