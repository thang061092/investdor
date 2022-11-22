<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormLogin;
use App\Http\Requests\FormRegister;
use App\Http\Services\UserService;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

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
        if ($request->password != $request->password_confirmation) {
            $error = __('auth.repassword_mismatched');
            return redirect()->back()->withInput()->with(['error' => $error]);
        } else {
            $user = $this->userService->customer_register($request);
            if ($user) {
                Session::put('customer', $user);
                return redirect()->route('customer.home_page');
            } else {
                return redirect()->back()->withInput();
            }
        }
    }

    public function logout()
    {
        Session::forget('customer');
        return redirect()->route('home.index');
    }

    public function google_redirect()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function google_callback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        $data = $this->userService->login_google($user);
        if (!empty($data['user'])) {
            Session::put('customer', $data['user']);
            return redirect()->route('customer.home_page');
        } else {
            $error = !empty($data['message']) ? $data['message'] : 'Login Fail';
            return view('customer.auth.login', compact('error'));
        }


    }
}
