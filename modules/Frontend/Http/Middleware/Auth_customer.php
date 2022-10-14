<?php


namespace Modules\Frontend\Http\Middleware;


use Closure;

class Auth_customer
{
    const CUSTOMER = 2;

    public function handle($request, Closure $next)
    {
        $user = $request->session()->get('user');
        if ($user) {
            if ($user['type'] == self::CUSTOMER) {
                return $next($request);
            }
        }
        return redirect()->route('Frontend::home.index');
    }
}
