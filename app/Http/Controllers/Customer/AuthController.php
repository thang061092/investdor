<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormLogin;
use App\Http\Requests\FormRegister;
use App\Http\Services\UserService;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends BaseController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register()
    {
        return view('customer.auth.register');
    }

    public function login()
    {
        return view('customer.auth.login');
    }

    public function login_submit(FormLogin $request)
    {
        $data = $this->userService->check_login($request, Users::INVESTOR);
        if (!empty($data['message'])) {
            $error = $data['message'];
        } else {
            $user = $this->userService->login($data['user']);
            if ($user) {
                Session::put('customer', $user);
                return redirect()->route('customer.home_page');
            } else {
                $error = __('auth.login_fail');
            }
        }
        return view('customer.auth.login', compact('error'));
    }

    public function register_submit(FormRegister $request)
    {
        $user = $this->userService->customer_register($request);
        if ($user) {
            Session::put('customer', $user);
            return redirect()->route('customer.home_page');
        } else {
            return redirect()->route('customer.register');
        }
    }

    public function logout()
    {
        Session::forget('customer');
        return redirect()->route('home.index');
    }
}
