<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormLogin;
use App\Http\Requests\FormRegister;
use App\Http\Services\MailService;
use App\Http\Services\UserService;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Yoeunes\Toastr\Facades\Toastr;

class AuthController extends BaseController
{
    protected $userService;
    protected $mailService;

    public function __construct(UserService $userService,
                                MailService $mailService)
    {
        $this->userService = $userService;
        $this->mailService = $mailService;
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
        Toastr::error($error);
        return back()->withInput();
    }

    public function register_submit(FormRegister $request)
    {
        $check_email = $this->userService->check_email($request);
        if (count($check_email) > 0) {
            Toastr::error($check_email[0]);
            return redirect()->back()->withInput();
        }
        if ($request->password != $request->password_confirmation) {
            $error = __('auth.repassword_mismatched');
            Toastr::error($error);
            return redirect()->back();
        }

        $user = $this->userService->customer_register($request);
        if ($user) {
            $html = view('email.xacthuctaikhoan', compact('user'))->render();
            $this->mailService->sendMail('Xác thực tài khoản', $user['email'], $user['full_name'], $html);
            return view('customer.auth.check-register', compact('user'));
        } else {
            return redirect()->back()->withInput();
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

    public function otp_register(Request $request)
    {
        $check = $this->userService->check_otp_register($request);
        if (count($check) > 0) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $check[0]);
        } else {
            $user = $this->userService->otp_register($request);
            if ($user) {
                Session::put('customer', $user);
                return BaseController::send_response(self::HTTP_OK, __('message.success'));
            } else {
                return BaseController::send_response(self::HTTP_BAD_REQUEST, __('message.fail'));
            }
        }
    }

    public function forgot_password()
    {
        return view('customer.auth.quenmatkhau');
    }

    public function send_email_forgot_pass(Request $request)
    {
        $check = $this->userService->check_send_email_forgot_pass($request);
        if (count($check) > 0) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $check[0]);
        } else {
            $result = $this->userService->send_email_forgot_pass($request);
            if ($result->statusCode() == 202) {
                $message = __('auth.Please_check_your_mailbox_for_a_new_password');
                return BaseController::send_response(self::HTTP_OK, $message);
            } else {
                return BaseController::send_response(self::HTTP_BAD_REQUEST, __('message.fail'));
            }
        }
    }

    public function new_password_post(Request $request)
    {
        $check = $this->userService->check_new_password($request);
        if (count($check) > 0) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $check[0]);
        } else {
            $user = $this->userService->new_password($request);
            if ($user) {
                return BaseController::send_response(self::HTTP_OK, __('message.Change_password_successfully'));
            } else {
                return BaseController::send_response(self::HTTP_BAD_REQUEST, __('message.fail'));
            }
        }
    }

    public function new_password()
    {
        return view('customer.auth.new-password');
    }
}
