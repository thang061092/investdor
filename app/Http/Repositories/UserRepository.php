<?php


namespace App\Http\Repositories;


use App\Models\User;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return User::class;
    }
}
