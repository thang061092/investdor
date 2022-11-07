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

    public function get_all_employee() {
        $employees = BaseRepository::get_all_employee();
        return $employees;
    }

    public function get_all_customer() {
        $customer = BaseRepository::get_all_customer();
        return $customer;
    }
}
