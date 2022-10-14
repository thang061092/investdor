<?php


namespace Modules\Backend\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Modules\Backend\Http\Service\UserService;
use Modules\Mysql\Controller\BaseController;
use Modules\Mysql\Models\User;

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

    public function create_employee(Request $request)
    {
        $validate = $this->userService->validate_create_employee($request);
        if ($validate->fails()) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $user = $this->userService->create_employee($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $user);
        }
    }

    public function create_admin(Request $request)
    {
        $user = $this->userService->create_admin($request);
        return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $user);
    }

    public function employee_login(Request $request)
    {
        $validate = $this->userService->validate_login($request);
        if ($validate->fails()) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
        }
        $data = $this->userService->check_login($request, User::EMPLOYEE);
        if (!empty($data['message'])) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $data['message']);
        } else {
            $user = $this->userService->login($data['user']);
            return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $user);
        }
    }

}
