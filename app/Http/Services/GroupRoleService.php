<?php


namespace App\Http\Services;


use App\Http\Repositories\GroupRoleRepository;
use App\Models\GroupRole;
use Illuminate\Support\Facades\Validator;

class GroupRoleService
{
    protected $groupRoleRepository;

    public function __construct(GroupRoleRepository $groupRoleRepository)
    {
        $this->groupRoleRepository = $groupRoleRepository;
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
        ]);
    }
}
