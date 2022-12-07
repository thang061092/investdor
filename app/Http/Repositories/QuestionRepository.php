<?php


namespace App\Http\Repositories;

use App\Models\Question;

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
            $start_date =  (date('Y-m-d 00:00:00', strtotime($request['start_date'])));
            $model = $model->where(Question::CREATED_AT, '>=' ,$start_date);
        }
        if (!empty($request['end_date'])) {
            $end_date =  (date('Y-m-d 00:00:00', strtotime($request['end_date'])));
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
