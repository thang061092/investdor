<?php


namespace App\Http\Services;


use App\Http\Repositories\QuestionRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;
use App\Http\Services\UploadService;
use Illuminate\Support\Str;

class QuestionService
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function get_all() 
    {
        return $this->questionRepository->getAll();
    }

    public function find($id)
    {
        return $this->questionRepository->find($id);
    }

    public function create($request) 
    {
        $data = [
            Question::NAME => $request->name ?? "",
            Question::EMAIL => $request->email ?? "",
            Question::QUESTION => $request->question ?? "",
            Question::TYPE => Question::NO_ANSWER,
        ];
        $create = $this->questionRepository->create($data);
        if ($create) {
            return $create;
        }
        return false;
    }

    public function send_answer($request, $id)
    {
        $data = [
            Question::ANSWER_QUESTION => $request->answer ?? "",
            Question::TYPE => Question::ANSWER,
        ];
        $update = $this->questionRepository->update($id, $data);
        if ($update) {
            return $update;
        }
        return false;
    }
}
