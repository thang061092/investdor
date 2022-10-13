<?php

namespace Modules\Backend\Http\Middleware;

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
            Lang::setLocale(Session::get('lang'));
        } else {
            Lang::setLocale('vi');
        }
        return $next($request);
    }

}
