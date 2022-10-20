<?php


namespace App\Http\Repositories;

use App\Models\Users;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return Users::class;
    }
}
