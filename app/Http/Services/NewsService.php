<?php


namespace App\Http\Services;


use App\Http\Repositories\NewsRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Http\Services\UploadService;
use Illuminate\Support\Str;

class NewsService
{
    protected $newsRepository;
    protected $uploadService;

    public function __construct(NewsRepository $newsRepository, UploadService $uploadService)
    {
        $this->newsRepository = $newsRepository;
        $this->uploadService = $uploadService;
    }

    public function get_all() 
    {
        return $this->newsRepository->getAll();
    }

    public function find($id)
    {
        return $this->newsRepository->find($id);
    }

    public function create($request) 
    {
        if ($request->img_news) {
            $image = $this->uploadService->upload_param($request->img_news);
        }
        $data = [
            News::TITLE => $request->title ?? "",
            News::SLUG => Str::slug($request->title) ?? "",
            News::CATEGORY => $request->category ?? "",
            News::CATEGORY_SLUG => Str::slug($request->category) ?? "",
            News::IMAGE => $image ?? "",
            News::CONTENT => $request->content ?? "",
            News::STATUS    => News::ACTIVE,
            News::CREATED_BY    => session()->get('employee')['email'],
        ];
        $create = $this->newsRepository->create($data);
        if ($create) {
            return $create;
        }
        return false;
    }

    public function update_status($id) 
    {
        $detail = $this->newsRepository->find($id);
        if ($detail[News::STATUS] == News::ACTIVE) {
            $data = [
                News::STATUS => News::DEACTIVE
            ];
        } else {
            $data = [
                News::STATUS => News::ACTIVE
            ];
        }
        $status = $this->newsRepository->update($id, $data);
        return $status;
    }

    public function update_news($request, $id) 
    {
        if ($request->img_news) {
            $image = $this->uploadService->upload_param($request->img_news);
        }
        $data = [
            News::TITLE => $request->title ?? "",
            News::SLUG => Str::slug($request->title) ?? "",
            News::CATEGORY => $request->category ?? "",
            News::CONTENT=>  $request->content ?? "",
            News::IMAGE => $image ?? "",
        ];
        $news = $this->newsRepository->update($id, $data);
        return $news;
    }
}
