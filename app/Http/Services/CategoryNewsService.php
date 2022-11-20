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
            CategoryNews::NAME => $request->name_category_vi ?? "",
            CategoryNews::NAME_EN => $request->name_category_en ?? "",
            CategoryNews::SLUG => Str::slug($request->name_category) ?? "",
            CategoryNews::SLUG_EN => Str::slug($request->name_category_en) ?? "",
            CategoryNews::IMAGE => $image ?? "",
            CategoryNews::DESCRIPTION => $request->desc_category_vi ?? "",
            CategoryNews::DESCRIPTION_EN => $request->desc_category_en ?? "",
            CategoryNews::STATUS   => CategoryNews::ACTIVE,
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
        if ($request->img_category) {
            $img_category = $this->uploadService->upload_param($request->img_category);
        }
        $data = [
            CategoryNews::NAME => $request->name_category_vi ?? "",
            CategoryNews::NAME_EN => $request->name_category_en ?? "",
            CategoryNews::SLUG => Str::slug($request->name_category_vi) ?? "",
            CategoryNews::SLUG_EN => Str::slug($request->name_category_en) ?? "",
            CategoryNews::IMAGE => $img_category ?? "",
            CategoryNews::DESCRIPTION => $request->desc_category_vi ?? "",
            CategoryNews::DESCRIPTION_EN => $request->desc_category_en ?? "",
            CategoryNews::CREATED_BY    => session()->get('employee')['email'],
        ];
        $update = $this->categoryRepo->update($id, $data);
        return $update;
    }
}
