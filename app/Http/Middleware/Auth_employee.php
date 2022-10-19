<?php


namespace App\Http\Middleware;


use Closure;

class Auth_employee
{
    const EMPLOYEE = 1;

    public function handle($request, Closure $next)
    {
        $user = $request->session()->get('user');
        if ($user) {
            if ($user['type'] == self::EMPLOYEE) {
                return $next($request);
            }
        }
        return redirect()->route('home.index');
    }
}
