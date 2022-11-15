<?php


namespace App\Http\Repositories;

use App\Models\Users;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return Users::class;
    }

    public function get_all_employee()
    {
        $model = $this->model;
        $model = $model
            ->where(Users::TYPE, Users::EMPLOYEE)
            ->get();
        return $model;
    }

    public function get_all_customer()
    {
        $model = $this->model;
        $model = $model
            ->where(Users::TYPE, Users::INVESTOR)
            ->get();
        return $model;
    }
}
