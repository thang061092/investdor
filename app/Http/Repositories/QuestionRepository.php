<?php


namespace App\Http\Repositories;

use App\Models\Question;

class QuestionRepository extends BaseRepository
{
    public function getModel()
    {
        return Question::class;
    }

}
