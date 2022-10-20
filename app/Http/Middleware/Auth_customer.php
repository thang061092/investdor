<?php


namespace App\Http\Middleware;


use Closure;

class Auth_customer
{
    const CUSTOMER = 2;

    public function handle($request, Closure $next)
    {
        $user = $request->session()->get('customer');
        if ($user) {
            if ($user['type'] == self::CUSTOMER) {
                return $next($request);
            }
        }
        return redirect()->route('home.index');
    }
}
