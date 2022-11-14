<?php


namespace App\Http\Services;


use App\Http\Repositories\CategoryNewsRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\CategoryNews;
use App\Http\Services\UploadService;
use Illuminate\Support\Str;

class CategoryNewsService
{
    protected $categoryRepo;
    protected $uploadService;

    public function __construct(CategoryNewsRepository $categoryRepo, UploadService $uploadService)
    {
        $this->categoryRepo = $categoryRepo;
        $this->uploadService = $uploadService;
    }

    public function get_all() 
    {
        return $this->categoryRepo->getAll();
    }

    public function find($id)
    {
        return $this->categoryRepo->find($id);
    }

    public function create($request) 
    {
        if ($request->hasFile('file')){
            $image = $this->uploadService->upload($request);
        }
        $data = [
            CategoryNews::NAME => $request->name_category ?? "",
            CategoryNews::SLUG => Str::slug($request->name_category) ?? "",
            CategoryNews::IMAGE => $image ?? "",
            CategoryNews::DESCRIPTION => $request->desc_category ?? "",
            CategoryNews::STATUS   => CategoryNews::ACTIVE,
            CategoryNews::CREATED_AT    => date('Y/m/d', time()),
            CategoryNews::CREATED_BY    => session()->get('employee')['email'],
        ];
        $create = $this->categoryRepo->create($data);
        if ($create) {
            return $create;
        }
        return false;
    }

    public function update_status($id) {
        $detail = $this->categoryRepo->find($id);
        if ($detail[CategoryNews::STATUS] == CategoryNews::ACTIVE) {
            $data = [
                CategoryNews::STATUS => CategoryNews::DEACTIVE
            ];
        } else {
            $data = [
                CategoryNews::STATUS => CategoryNews::ACTIVE
            ];
        }
        $status = $this->categoryRepo->update($id, $data);
        return $status;
    }

    public function update($request, $id) 
    {
        if ($request->hasFile('file')){
            $image = $this->uploadService->upload($request);
        }
        $data = [
            CategoryNews::NAME => $request->name_category ?? "",
            CategoryNews::SLUG => Str::slug($request->name_category) ?? "",
            CategoryNews::IMAGE => $image ?? "",
            CategoryNews::DESCRIPTION => $request->desc_category ?? "",
            CategoryNews::CREATED_AT    => date('Y/m/d', time()),
            CategoryNews::CREATED_BY    => session()->get('employee')['email'],
        ];
        $update = $this->categoryRepo->update($id, $data);
        return $update;
    }
}
