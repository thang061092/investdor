<?php


namespace App\Http\Repositories;


use App\Models\Menu;

class MenuRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Menu::class;
    }

    public function get_parent()
    {
        return $this->model
            ->whereNull(Menu::PARENT_ID)
            ->get();
    }

    public function get_user_add_role($menuIds)
    {
        return $this->model
            ->whereNotIn(Menu::SLUG, $menuIds)
            ->get();
    }

    public function getIds($menus)
    {
        return $this->model
            ->whereIn(Menu::SLUG, $menus)
            ->pluck(Menu::ID);
    }
}
