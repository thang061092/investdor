<?php


namespace App\Http\Services;


use App\Http\Repositories\GroupRoleRepository;

class GroupRoleService
{
    protected $groupRoleRepository;

    public function __construct(GroupRoleRepository $groupRoleRepository)
    {
        $this->groupRoleRepository = $groupRoleRepository;
    }
}
