<?php


namespace App\Http\Repositories;

use App\Models\News;
use Carbon\Carbon;

class NewsRepository extends BaseRepository
{
    public function getModel()
    {
        return News::class;
    }

    public function get_all($request)
    {
        $model = $this->model;
        if (!empty($request['start_date'])) {
            $start_date = Carbon::parse($request['start_date'])->format('Y-m-d 00:00:00');
            $model = $model->where(News::CREATED_AT, '>=' ,$start_date);
        }
        if (!empty($request['end_date'])) {
            $end_date = Carbon::parse($request['end_date'])->format('Y-m-d 23:59:59');
            $model = $model->where(News::CREATED_AT, '<=' ,$end_date);
        }
        if (!empty($request['name_search'])) {
            $name = $request['name_search'];
            $model = $model->where(News::TITLE, 'like', "%$name%");
        }
        if (!empty($request['email_search'])) {
            $email = $request['email_search'];
            $model = $model->where(News::CREATED_BY, 'like', "%$email%");
        }
        if (!empty($request['category_search'])) {
            $model = $model->where(News::CATEGORY_NEWS_ID, $request['category_search']);
        }
        if (!empty($request['status_search'])) {
            $model = $model->where(News::STATUS, $request['status_search']);
        }
        return $model
        ->orderBy(News::CREATED_AT, 'DESC')
        ->paginate(10);
    }
}
