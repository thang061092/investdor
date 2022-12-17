<?php


namespace App\Http\Services;


use App\Http\Repositories\MenuRepository;
use App\Http\Repositories\UserRepository;
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
        $user = $this->userRepository->find(Session::get('employee')['id']);
        $groups = $user->groupRoles()->get();
        foreach ($groups as $group) {
            $menus = $group->menus()->get();
            dd($menus);
        }
        dd($groups);
    }
}
