<?php


namespace App\Http\Repositories;

use App\Models\Users;
use Carbon\Carbon;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return Users::class;
    }

    public function get_all_employee($request)
    {
        $model = $this->model;
        if (!empty($request['start_date'])) {
            $start_date = Carbon::parse($request['start_date'])->format('Y-m-d 00:00:00');
            $model = $model->where(Users::CREATED_AT, '>=' ,$start_date);
        }
        if (!empty($request['end_date'])) {
            $end_date = Carbon::parse($request['end_date'])->format('Y-m-d 23:59:59');
            $model = $model->where(Users::CREATED_AT, '<=' ,$end_date);
        }
        if (!empty($request['name_search'])) {
            $name = $request['name_search'];
            $model = $model->where(Users::FULL_NAME, 'like', "%$name%");
        }
        if (!empty($request['email_search'])) {
            $email = $request['email_search'];
            $model = $model->where(Users::EMAIL, 'like', "%$email%");
        }
        if (!empty($request['status_search'])) {
            $model = $model->where(Users::STATUS, $request['status_search']);
        }
        return $model
        ->where(Users::TYPE, Users::EMPLOYEE)
        ->orderBy(Users::CREATED_AT, 'DESC')
        ->paginate(10);
    }

    public function get_all_customer($request)
    {
        $model = $this->model;
        if (!empty($request['start_date'])) {
            $start_date = Carbon::parse($request['start_date'])->format('Y-m-d 00:00:00');
            $model = $model->where(Users::CREATED_AT, '>=' ,$start_date);
        }
        if (!empty($request['end_date'])) {
            $end_date = Carbon::parse($request['end_date'])->format('Y-m-d 23:59:59');
            $model = $model->where(Users::CREATED_AT, '<=' ,$end_date);
        }
        if (!empty($request['name_search'])) {
            $name = $request['name_search'];
            $model = $model->where(Users::FULL_NAME, 'like', "%$name%");
        }
        if (!empty($request['email_search'])) {
            $email = $request['email_search'];
            $model = $model->where(Users::EMAIL, 'like', "%$email%");
        }
        if (!empty($request['status_search'])) {
            $model = $model->where(Users::STATUS, $request['status_search']);
        }
        if (!empty($request['auth_search'])) {
            $model = $model->where(Users::ACCURACY, $request['auth_search']);
        }
        return $model
        ->where(Users::TYPE, Users::INVESTOR)
        ->orderBy(Users::CREATED_AT, 'DESC')
        ->paginate(10);
    }

    public function get_user_add_role($userIds)
    {
        $model = $this->model;
        $model = $model
            ->where(Users::TYPE, Users::EMPLOYEE)
            ->whereNotIn(Users::ID, $userIds)
            ->get();
        return $model;
    }
}
