<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\ActionService;
use App\Http\Services\GroupRoleService;
use App\Http\Services\MenuService;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    protected $actionService;
    protected $menuService;

    public function __construct(ActionService $actionService,
                                MenuService $menuService)
    {
        $this->actionService = $actionService;
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menus = $this->menuService->get_all();
        $roles = $this->actionService->get_all();
        return view('employee.role.list', compact('roles', 'menus'));
    }

    public function create(Request $request)
    {
        $validate = $this->actionService->validate_create($request);
        if ($validate->fails()) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $this->actionService->create($request);
            return BaseController::send_response(self::HTTP_OK, __('message.success'));
        }
    }

    public function get_action_add_user(Request $request)
    {
        $menus = $this->actionService->get_action_add_user($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'), $menus);
    }
}
