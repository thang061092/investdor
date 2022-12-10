<?php


namespace App\Http\Repositories;

use App\Models\CategoryNews;

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
            $start_date =  (date('Y-m-d 00:00:00', strtotime($request['start_date'])));
            $model = $model->where(CategoryNews::CREATED_AT, '>=' ,$start_date);
        }
        if (!empty($request['end_date'])) {
            $end_date =  (date('Y-m-d 00:00:00', strtotime($request['end_date'])));
            $model = $model->where(CategoryNews::CREATED_AT, '<=' ,$end_date);
        }
        if (!empty($request['name_search'])) {
            $name = $request['name_search'];
            $model = $model->where(CategoryNews::NAME, 'like', "%$name%");
        }
        if (!empty($request['status_search'])) {
            $model = $model->where(CategoryNews::STATUS, $request['status_search']);
        }
        return $model
        ->orderBy(CategoryNews::CREATED_AT, 'DESC')
        ->paginate(10);
    }
}
