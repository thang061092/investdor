<?php


namespace App\Http\Repositories;

use App\Models\CategoryNews;
use Carbon\Carbon;

class CategoryNewsRepository extends BaseRepository
{
    public function getModel()
    {
        return CategoryNews::class;
    }

    public function get_all($request)
    {
        $model = $this->model;
        if (!empty($request['start_date'])) {
            $start_date = Carbon::parse($request['start_date'])->format('Y-m-d 00:00:00');
            $model = $model->where(CategoryNews::CREATED_AT, '>=' ,$start_date);
        }
        if (!empty($request['end_date'])) {
            $end_date = Carbon::parse($request['end_date'])->format('Y-m-d 23:59:59');
            $model = $model->where(CategoryNews::CREATED_AT, '<=' ,$end_date);
        }
        if (!empty($request['name_search'])) {
            $name = $request['name_search'];
            $model = $model->where(CategoryNews::NAME, 'like', "%$name%");
        }
        if (!empty($request['status_search'])) {
            $model = $model->where(CategoryNews::STATUS, $request['status_search']);
        }
        if (!empty($request['email_search'])) {
            $email = $request['email_search'];
            $model = $model->where(CategoryNews::CREATED_BY, 'like', "%$email%");
        }
        return $model
        ->orderBy(CategoryNews::CREATED_AT, 'DESC')
        ->paginate(10);
    }
}
