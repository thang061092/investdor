<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Requests\FormRegister;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\FormLogin;
use App\Http\Requests\FormUpdateProfile;

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
            $user = session()->get('customer');
            $userId = $user['id'];
            $detail = $this->userService->find($userId);
            return view('customer.user.profile', [
                'detail' => $detail
            ]);
        }
        return view('customer.user.manager');
    }

    public function update_profile(FormUpdateProfile $request) {
        $data = $request->all();
        $user = session()->get('customer');
        $userId = $user['id'];
        $update_profile = $this->userService->update_profile($data, $userId);
        if ($update_profile) {
            return redirect("/customer/user/manager?main_tab=profile")->with('status', 'Cập nhật thông tin thành công!');
        }
        return redirect("/customer/user/manager?main_tab=profile")->with('fails', 'Cập nhật thông tin thất bại! Vui lòng thử lại sau!');
    }
}
