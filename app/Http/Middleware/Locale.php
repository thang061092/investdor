<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class Locale
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
        if (!empty($request->lang)) {
            Session::put('lang', $request->lang);
        } else {
            if (!Session::has('lang')) {
                Session::put('lang', 'vi');
            }
        }
        Lang::setLocale(Session::get('lang'));
        return $next($request);
    }

}
