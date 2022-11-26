<?php


namespace App\Http\Repositories;


use App\Models\GroupRole;

class GroupRoleRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return GroupRole::class;
    }
}
