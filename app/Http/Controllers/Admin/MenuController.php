<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request)
    {
        $menus = $this->menuService->get_all();
        $parents = $this->menuService->get_parent();
        return view('employee.menu.list', compact('menus', 'parents'));
    }

    public function create(Request $request)
    {
        $validate = $this->menuService->validate_create($request);
        if ($validate->fails()) {
            return BaseController::send_response(self::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $this->menuService->create($request);
            return BaseController::send_response(self::HTTP_OK, __('message.success'));
        }
    }

    public function get_menu_add_role(Request $request)
    {
        $menus = $this->menuService->get_menu_add_role($request);
        return BaseController::send_response(self::HTTP_OK, __('message.success'), $menus);
    }
}
