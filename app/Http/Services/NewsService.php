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

    public function filter($request) 
    {   
        $search = $request->all();
        return $this->newsRepository->get_all($search);
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
            News::TITLE => $request->title_vi ?? "",
            News::TITLE_EN => $request->title_en ?? "",
            News::SLUG => Str::slug($request->title_vi) ?? Str::slug($request->title_en),
            News::CATEGORY_NEWS_ID => $request->category ?? "",
            News::IMAGE => $image ?? "",
            News::CONTENT => $request->content_vi ?? "",
            News::CONTENT_EN => $request->content_en ?? "",
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
        $detail = $this->newsRepository->find($id);
        if ($request->img_news) {
            $image = $this->uploadService->upload_param($request->img_news);
        }
        $data = [
            News::TITLE => $request->title_vi ?? "",
            News::TITLE_EN => $request->title_en ?? "",
            News::SLUG => Str::slug($request->title_vi) ?? Str::slug($request->title_en),
            News::CATEGORY => $request->category ?? "",
            News::CATEGORY_SLUG => Str::slug($request->category) ?? "",
            News::CONTENT => $request->content_vi ?? "",
            News::CONTENT_EN => $request->content_en ?? "",
            News::IMAGE => !empty($request->img_news) ? $image : $detail['image'],
            News::UPDATED_BY    => session()->get('employee')['email'],
        ];
        $news = $this->newsRepository->update($id, $data);
        return $news;
    }
}
