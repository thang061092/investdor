<?php


namespace App\Http\Repositories;

use App\Models\Users;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return Users::class;
    }

    public function find($id) {
        $user = BaseRepository::find($id);
        return $user;
    }

    public function update_profile($id, $data) {
        $update = BaseRepository::update($id, $data);
        return $update;
    }
}
