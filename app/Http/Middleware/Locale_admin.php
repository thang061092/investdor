<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class Locale_admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Session::put('lang', 'vi');
        Lang::setLocale(Session::get('lang'));
        return $next($request);
    }
}
