<?php


namespace App\Http\Services;


use App\Http\Repositories\MenuRepository;
use App\Http\Repositories\UserRepository;
use App\Models\Menu;
use App\Models\Users;
use Illuminate\Support\Facades\Session;

class SideBarService
{
    protected $menuRepository;
    protected $userRepository;

    public function __construct(MenuRepository $menuRepository,
                                UserRepository $userRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->userRepository = $userRepository;
    }

    public function sidebar()
    {
        $data = [];
        $data_parent = [];
        $data_child = [];
        $user = $this->userRepository->find(Session::get('employee')['id']);
        if ($user['is_admin'] == Users::ADMIN) {
            $menu_parents = $this->menuRepository->get_parent();
            foreach ($menu_parents as $key => $menu_parent) {
                $data[$key] = $menu_parent;
                $data[$key]['child'] = $this->menuRepository->findMany([Menu::PARENT_ID => $menu_parent['id']]);
            }
        } else {
            $groups = $user->groupRoles()->get();
            foreach ($groups as $group) {
                $menus = $group->menus()->get();
                foreach ($menus as $menu) {
                    if ($menu['level'] == 1) {
                        $data_parent[] = $menu['id'];
                    } else {
                        $data_child[] = $menu['id'];
                    }
                }
                $data_parent_unique = array_unique($data_parent);
                $data_child_unique = array_unique($data_child);

                foreach ($data_parent_unique as $key => $value) {
                    $mn = $this->menuRepository->find($value);
                    $data[$key] = $mn;
                    $childes = $this->get_id_menu_child($value, $data_child_unique);
                    if (count($childes) > 0) {
                        $data[$key]['child'] = $childes;
                    }
                }
            }
        }
        return $data;
    }

    private function get_id_menu_child($parent_id, $menus)
    {
        $data = [];
        $childes = $this->menuRepository->findMany([Menu::PARENT_ID => $parent_id]);
        foreach ($childes as $child) {
            array_push($data, $child['id']);
        }
        $result = [];
        if ($data) {
            foreach ($menus as $value) {
                if (in_array($value, $data)) {
                    $child = $this->menuRepository->find($value);
                    array_push($result, $child);
                }
            }
        }
        return $result;
    }

    public function activeMenuParent($id, $menu)
    {
        foreach ($menu as $item) {
            if ($item['parent_id'] == $id) {
                if (!str_starts_with($item['url'], '/')) {
                    $url = '/' . $item['url'];
                }
                if (request()->getRequestUri() == $url) {
                    return 'show';
                }
            }
        }
        return '';
    }

    public function activeMenu($url)
    {
        if (!str_starts_with($url, '/')) {
            $url = '/' . $url;
        }
        if (request()->getRequestUri() == $url) {
            return 'active';
        }
        return '';
    }

    public function colorMenu($url)
    {
        if (!str_starts_with($url, '/')) {
            $url = '/' . $url;
        }
        if (request()->getRequestUri() == $url) {
            return 'text-success';
        }
        return '';
    }

    public function urlMenu($url)
    {
        if (str_starts_with($url, '/')) {
            return request()->root() . $url;
        }
        return request()->root() . '/' . $url;
    }
}
