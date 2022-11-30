<?php


namespace App\Http\Services;


use App\Http\Repositories\BusinessPlanRepository;
use Illuminate\Support\Facades\Validator;

class BusinessPlanService
{
    protected $businessPlanRepository;

    public function __construct(BusinessPlanRepository $businessPlanRepository)
    {
        $this->businessPlanRepository = $businessPlanRepository;
    }

    public function find($id)
    {
        return $this->businessPlanRepository->find($id);
    }

    public function update_plan($request)
    {
        $data = [];
        if (!empty($request->title_vi)) {
            $data['title_vi'] = $request->title_vi;
            $data['slug_vi'] = slugify($request->title_vi);
        }
        if (!empty($request->title_en)) {
            $data['title_en'] = $request->title_en;
            $data['slug_en'] = slugify($request->title_en);
        }
        if (!empty($request->description_vi)) {
            $data['description_vi'] = $request->description_vi;
        }
        if (!empty($request->description_en)) {
            $data['description_en'] = $request->description_en;
        }
        $this->businessPlanRepository->update($request->id, $data);
        return;
    }

    public function validate_update_plan($request)
    {
        $validate = Validator::make($request->all(), [
            'title_vi' => 'required',
            'title_en' => 'required',
            'description_vi' => 'required',
            'description_en' => 'required',
        ], [
            'title_vi.required' => __('validate.title_vi_not_null'),
            'title_en.required' => __('validate.title_en_not_null'),
            'description_vi.required' => __('validate.description_vi_not_null'),
            'description_en.required' => __('validate.description_en_not_null'),
        ]);
        return $validate;
    }
}
