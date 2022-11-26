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
}
