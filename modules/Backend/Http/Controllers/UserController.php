<?php


namespace Modules\Backend\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Backend\Http\Service\UserService;
use Modules\Mysql\Controller\BaseController;

class UserController extends BaseController
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function find(Request $request)
    {
        $user = $this->userService->find($request->id);
        return BaseController::send_response(BaseController::HTTP_OK, BaseController::SUCCESS, $user);
    }

}
