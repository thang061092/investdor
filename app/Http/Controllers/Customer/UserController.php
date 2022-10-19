<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Models\User;

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
        return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $user);
    }

    public function customer_register(Request $request)
    {
        $validate = $this->userService->validate_customer_register($request);
        if ($validate->fails()) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $user = $this->userService->customer_register($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $user);
        }
    }

    public function customer_login_social(Request $request)
    {
        $message = $this->userService->validate_login_social($request);
        if (count($message) > 0) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $message[0]);
        } else {
            $data = $this->userService->login_social($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $data);
        }
    }

    public function customer_login(Request $request)
    {
        $validate = $this->userService->validate_login($request);
        if ($validate->fails()) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
        }
        $data = $this->userService->check_login($request, User::INVESTOR);
        if (!empty($data['message'])) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $data['message']);
        } else {
            $user = $this->userService->login($data['user']);
            return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $user);
        }
    }

}
