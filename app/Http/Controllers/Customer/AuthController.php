<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;

class AuthController extends BaseController
{
    public function register()
    {
        return view('customer.auth.register');
    }

    public function login()
    {
        return view('customer.auth.login');
    }
}
