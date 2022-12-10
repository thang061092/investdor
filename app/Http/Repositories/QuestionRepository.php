<?php


namespace App\Http\Repositories;

use App\Models\Question;
use Carbon\Carbon;

class QuestionRepository extends BaseRepository
{
    public function getModel()
    {
        return Question::class;
    }

    public function get_all($request)
    {
        $model = $this->model;
        if (!empty($request['start_date'])) {
            $start_date = Carbon::parse($request['start_date'])->format('Y-m-d 00:00:00');
            $model = $model->where(Question::CREATED_AT, '>=' ,$start_date);
        }
        if (!empty($request['end_date'])) {
            $end_date = Carbon::parse($request['end_date'])->format('Y-m-d 23:59:59');
            $model = $model->where(Question::CREATED_AT, '<=' ,$end_date);
        }
        if (!empty($request['status_search'])) {
            $model = $model->where(Question::TYPE, $request['status_search']);
        }
        return $model
        ->orderBy(Question::CREATED_AT, 'DESC')
        ->paginate(10);
    }
}
