<?php


namespace App\Http\Services;


use App\Http\Repositories\MenuRepository;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MenuService
{
    protected $menuRepository;

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function get_all()
    {
        return $this->menuRepository->getAll();
    }

    public function get_parent()
    {
        return $this->menuRepository->get_parent();
    }

    public function validate_create($request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:menu',
        ], [
            'name.required' => __('validate.menu_not_null'),
            'name.unique' => __('validate.menu_already_exists'),
        ]);
        return $validate;
    }

    public function create($request)
    {
        $menu = $this->menuRepository->create([
            Menu::NAME => $request->name,
            Menu::SLUG => slugify($request->name),
            Menu::URL => $request->part_menu,
            Menu::PARENT_ID => $request->parent_menu,
            Menu::STATUS => Menu::ACTIVE,
            Menu::CREATED_BY => Session::get('employee')['email']
        ]);
        return $menu;
    }

    public function get_menu_add_role($request)
    {
        $menuIds = json_decode($request->menuids);
        $menus = $this->menuRepository->get_user_add_role($menuIds);
        foreach ($menus as $menu) {
            if (!empty($menu['parent_id'])) {
                $menu['name'] = $menu->menu->name . ' / ' . $menu['name'];
            }
        }
        return $menus;
    }
}
