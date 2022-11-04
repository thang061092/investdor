<?php


namespace App\Http\Services;


use App\Http\Controllers\BaseController;
use App\Http\Repositories\ImageProjectRepository;
use App\Http\Repositories\RealEstateProjectRepository;
use App\Models\ImageProject;
use App\Models\RealEstateProject;
use Illuminate\Support\Facades\Session;

class RealEstateProjectService
{
    protected $estateProjectRepository;
    protected $interestService;
    protected $imageProjectRepository;

    public function __construct(RealEstateProjectRepository $estateProjectRepository,
                                InterestService $interestService,
                                ImageProjectRepository $imageProjectRepository)
    {
        $this->estateProjectRepository = $estateProjectRepository;
        $this->interestService = $interestService;
        $this->imageProjectRepository = $imageProjectRepository;
    }

    public function create($request)
    {
        $data = [
            RealEstateProject::NAME_VI => $request->project_name_vi ?? null,
            RealEstateProject::NAME_EN => $request->project_name_en ?? null,
            RealEstateProject::SLUG_VI => slugify($request->project_name_vi),
            RealEstateProject::SLUG_EN => slugify($request->project_name_en),
            RealEstateProject::CITY_ID => $request->city_project ?? null,
            RealEstateProject::DISTRICT_ID => $request->district_project ?? null,
            RealEstateProject::WARD_ID => $request->ward_project ?? null,
            RealEstateProject::ADDRESS_VI => $request->address_project ?? null,
            RealEstateProject::TOTAL_VALUE => $request->total_value_project ?? null,
            RealEstateProject::PART => $request->total_part_project ?? null,
            RealEstateProject::VALUE_PART => $request->value_part_project ?? null,
            RealEstateProject::DESCRIPTION_VI => $request->description_project_vi ?? null,
            RealEstateProject::DESCRIPTION_EN => $request->description_project_en ?? null,
            RealEstateProject::TYPE => $request->type_project ?? null,
            RealEstateProject::STATUS => RealEstateProject::NEW,
            RealEstateProject::CREATED_BY => Session::get('employee')['email'] ?? null
        ];
        $this->estateProjectRepository->create($data);
    }

    public function getAllPaginate($request)
    {
        return $this->estateProjectRepository->getAllPaginate($request);
    }

    public function list_project_investor($request)
    {
        $projects = $this->estateProjectRepository->list_project_investor($request);
        return $projects;
    }

    public function detail_project($slug)
    {
        $project = $this->estateProjectRepository->find_project_by_slug($slug);
        return $project;
    }

    public function find($id)
    {
        return $this->estateProjectRepository->find($id);
    }

    public function update_image($request)
    {
        $project = $this->estateProjectRepository->update($request->id, [
            RealEstateProject::IMAGE => $request->anh_dai_dien
        ]);
        $this->imageProjectRepository->delete_image_project($project['id']);
        foreach ($request->img_project as $value) {
            $this->imageProjectRepository->create(
                [
                    ImageProject::REAL_ESTATE_PROJECT_ID => $project['id'],
                    ImageProject::STATUS => ImageProject::ACTIVE,
                    ImageProject::PATH => $value['path'],
                    ImageProject::TYPE => $value['file_type'],
                    ImageProject::NAME => $value['file_name'],
                    ImageProject::CREATED_BY=> Session::get('employee')['email'] ?? null
                ]
            );
        }
        return;
    }
}
