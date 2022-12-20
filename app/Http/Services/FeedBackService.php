<?php


namespace App\Http\Services;


use App\Http\Repositories\FeedBackRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\FeedBack;
use App\Http\Services\UploadService;
use Illuminate\Support\Str;

class FeedBackService
{
    protected $feedbackRepository;
    protected $uploadService;

    public function __construct(FeedBackRepository $feedbackRepository, UploadService $uploadService)
    {
        $this->feedbackRepository = $feedbackRepository;
        $this->uploadService = $uploadService;
    }

    public function get_all()
    {
        return $this->feedbackRepository->getAll();
    }

    public function find($id)
    {
        return $this->feedbackRepository->find($id);
    }

    public function create($request)
    {
        if ($request->avatar) {
            $avatar = $this->uploadService->upload_param($request->avatar);
        }
        $data = [
            FeedBack::FULL_NAME => $request->full_name ?? "",
            FeedBack::JOB_VI => $request->job_vi ?? "",
            FeedBack::JOB_EN => $request->job_en ?? "",
            FeedBack::AVATAR => $avatar ?? "",
            FeedBack::FEEDBACK_VI => $request->feedback_vi ?? "",
            FeedBack::FEEDBACK_EN => $request->feedback_en ?? "",
            FeedBack::STATUS => FeedBack::ACTIVE,
            FeedBack::CREATED_BY => session()->get('employee')['email'],
        ];
        $create = $this->feedbackRepository->create($data);
        if ($create) {
            return $create;
        }
        return false;
    }

    public function update($request, $id)
    {
        $detail = $this->feedbackRepository->find($id);
        if ($request->avatar) {
            $avatar = $this->uploadService->upload_param($request->avatar);
        }
        $data = [
            FeedBack::FULL_NAME => $request->full_name ?? "",
            FeedBack::JOB_VI => $request->job_vi ?? "",
            FeedBack::JOB_EN => $request->job_en ?? "",
            FeedBack::AVATAR => $avatar ?? $detail['avatar'],
            FeedBack::FEEDBACK_VI => $request->feedback_vi ?? "",
            FeedBack::FEEDBACK_EN => $request->feedback_en ?? "",
            FeedBack::STATUS => FeedBack::ACTIVE,
            FeedBack::UPDATED_BY => session()->get('employee')['email'],
        ];
        $news = $this->feedbackRepository->update($id, $data);
        return $news;
    }

    public function update_status($id)
    {
        $detail = $this->feedbackRepository->find($id);
        if ($detail[FeedBack::STATUS] == FeedBack::ACTIVE) {
            $data = [
                FeedBack::STATUS => FeedBack::DEACTIVE
            ];
        } else {
            $data = [
                FeedBack::STATUS => FeedBack::ACTIVE
            ];
        }
        $status = $this->feedbackRepository->update($id, $data);
        return $status;
    }

}
