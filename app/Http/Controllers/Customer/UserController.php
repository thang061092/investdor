<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Requests\FormRegister;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

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

    public function customer_login_social(Request $request)
    {
        $message = $this->userService->validate_login_social($request);
        if (count($message) > 0) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $message[0]);
        } else {
            $data = $this->userService->login_social($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $data);
        }
    }

    public function manager(Request $request)
    {
        $main_tab = !empty($request->main_tab) ? $request->main_tab : 'manager';
        $tab = !empty($request->tab) ? $request->tab : 'active';
        if ($main_tab == 'manager') {
            if ($tab == 'active') {
                return view('customer.user.manager');
            } elseif ($tab == 'complete') {
                return view('customer.user.manager-complete');
            } elseif ($tab == 'warning') {
                return view('customer.user.manager-warning');
            }
        } elseif ($main_tab == 'history') {
            return view('customer.user.history-investor');
        } elseif ($main_tab == 'profile') {
            return view('customer.user.profile');
        }
        return view('customer.user.manager');
    }
}
