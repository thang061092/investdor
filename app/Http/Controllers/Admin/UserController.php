<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormLogin;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function find(Request $request)
    {
        $user = $this->userService->find($request->id);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $user);
    }

    public function create_employee(Request $request)
    {
        $user = $this->userService->create_employee($request);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $user);
    }

    public function create_admin(Request $request)
    {
        $user = $this->userService->create_admin($request);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $user);
    }

    public function employee_login(FormLogin $request)
    {
        $data = $this->userService->check_login($request, Users::EMPLOYEE);
        if (!empty($data['message'])) {
            $error = $data['message'];
        } else {
            $user = $this->userService->login($data['user']);
            if ($user) {
                Session::put('employee', $user);
                return redirect()->route('dashboard');
            } else {
                $error = __('auth.login_fail');
            }
        }
        return view('employee.auth.login', compact('error'));
    }

    public function login(Request $request)
    {
        return view('employee.auth.login');
    }

    public function logout()
    {
        Session::forget('employee');
        return redirect()->route('admin');

    }

}
