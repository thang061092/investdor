<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Requests\FormRegister;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Models\Users;

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


}
