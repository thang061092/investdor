<?php


namespace Modules\Backend\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Backend\Http\Service\UserService;
use Modules\Mysql\Controller\BaseController;

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

    public function login_social(Request $request)
    {
        $message = $this->userService->validate_login_social($request);
        if ($validate->fails()) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $data = $this->userService->login_social($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $data);
        }
    }

}
