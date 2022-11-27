<?php


namespace App\Http\Services;


use App\Http\Repositories\GroupRoleRepository;
use App\Http\Repositories\MenuRepository;
use App\Models\GroupRole;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GroupRoleService
{
    protected $groupRoleRepository;
    protected $menuRepository;

    public function __construct(GroupRoleRepository $groupRoleRepository,
                                MenuRepository $menuRepository)
    {
        $this->groupRoleRepository = $groupRoleRepository;
        $this->menuRepository = $menuRepository;
    }

    public function get_all()
    {
        return $this->groupRoleRepository->getAll();
    }

    public function validate_store($request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:group_role',
        ], [
            'name.required' => __('validate.menu_not_null'),
            'name.unique' => __('validate.menu_already_exists'),
        ]);
        return $validate;
    }

    public function store($request)
    {
        $group = $this->groupRoleRepository->create([
            GroupRole::NAME => $request->name,
            GroupRole::SLUG => slugify($request->name),
            GroupRole::STATUS => GroupRole::ACTIVE,
            GroupRole::CREATED_BY => Session::get('employee')['email']
        ]);

        $users = [];
        if (!empty($request->users)) {
            $users = explode(',', $request->users);
        }
        $group->users()->sync($users);

        $menuIds = [];
        if (!empty($request->menus)) {
            $menus = explode(',', $request->menus);
            $menuIds = $this->menuRepository->getIds($menus);
        }
        $group->menus()->sync($menuIds);
        return $group;
    }

    public function find($id)
    {
        return $this->groupRoleRepository->find($id);
    }

    public function update($request)
    {
        $group = $this->groupRoleRepository->find($request->id);
        $users = [];
        if (!empty($request->users)) {
            $users = explode(',', $request->users);
        }
        $group->users()->sync($users);

        $menuIds = [];
        if (!empty($request->menus)) {
            $menus = explode(',', $request->menus);
            $menuIds = $this->menuRepository->getIds($menus);
        }
        $group->menus()->sync($menuIds);
        return $group;
    }
}
