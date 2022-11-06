<?php


namespace App\Http\Services;


use App\Http\Repositories\AssetProjectRepository;
use App\Http\Repositories\ImageProjectRepository;
use App\Http\Repositories\OverviewRepository;
use App\Http\Repositories\RealEstateProjectRepository;
use App\Models\AssetProject;
use App\Models\ImageProject;
use App\Models\OverviewProject;
use App\Models\RealEstateProject;
use Illuminate\Support\Facades\Session;

class RealEstateProjectService
{
    protected $estateProjectRepository;
    protected $interestService;
    protected $imageProjectRepository;
    protected $overviewRepository;
    protected $assetProjectRepository;

    public function __construct(RealEstateProjectRepository $estateProjectRepository,
                                InterestService $interestService,
                                ImageProjectRepository $imageProjectRepository,
                                OverviewRepository $overviewRepository,
                                AssetProjectRepository $assetProjectRepository)
    {
        $this->estateProjectRepository = $estateProjectRepository;
        $this->interestService = $interestService;
        $this->imageProjectRepository = $imageProjectRepository;
        $this->overviewRepository = $overviewRepository;
        $this->assetProjectRepository = $assetProjectRepository;
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
                    ImageProject::CREATED_BY => Session::get('employee')['email'] ?? null
                ]
            );
        }
        return;
    }

    public function update_extend($request)
    {
        $overview = $this->overviewRepository->findOne([OverviewProject::REAL_ESTATE_PROJECT_ID => $request->id]);
        if (!$overview) {
            $this->overviewRepository->create([
                OverviewProject::REAL_ESTATE_PROJECT_ID => $request->id,
                OverviewProject::OVERVIEW_VI => $request->description_project_vi,
                OverviewProject::OVERVIEW_EN => $request->description_project_en,
                OverviewProject::ADDRESS_VI => $request->address_project_vi,
                OverviewProject::ADDRESS_EN => $request->address_project_en,
                OverviewProject::MARKET_VI => $request->market_project_vi,
                OverviewProject::MARKET_EN => $request->market_project_en,
                OverviewProject::BASIS_VI => $request->background_project_vi,
                OverviewProject::BASIS_EN => $request->background_project_en,
            ]);
        } else {
            $this->overviewRepository->update($overview['id'], [
                OverviewProject::OVERVIEW_VI => $request->description_project_vi,
                OverviewProject::OVERVIEW_EN => $request->description_project_en,
                OverviewProject::ADDRESS_VI => $request->address_project_vi,
                OverviewProject::ADDRESS_EN => $request->address_project_en,
                OverviewProject::MARKET_VI => $request->market_project_vi,
                OverviewProject::MARKET_EN => $request->market_project_en,
                OverviewProject::BASIS_VI => $request->background_project_vi,
                OverviewProject::BASIS_EN => $request->background_project_en,
            ]);
        }
        return;
    }

    public function update_asset($request)
    {
        $asset = $this->assetProjectRepository->findOne([AssetProject::REAL_ESTATE_PROJECT_ID => $request->id]);
        if (!$asset) {
            $this->assetProjectRepository->create([
                AssetProject::YEAR_BUILT => $request->year_built,
                AssetProject::TOTAL_BUILDING_AREA => $request->total_building_area,
                AssetProject::NRSF => $request->nrsf,
                AssetProject::EXPECTED_CAPACITY => $request->expected_capacity,
                AssetProject::TARGET_TABLE => $request->target_table,
                AssetProject::CURRENT_PRICE => $request->current_price,
                AssetProject::PROJECT_HIGHLIGHTS_VI => $request->project_highlights_vi,
                AssetProject::PROJECT_HIGHLIGHTS_EN => $request->project_highlights_en,
                AssetProject::LONGITUDE => $request->longitude,
                AssetProject::LATITUDE => $request->latitude,
                AssetProject::REAL_ESTATE_PROJECT_ID => $request->id
            ]);
        } else {
            $this->assetProjectRepository->update($asset['id'], [
                AssetProject::YEAR_BUILT => $request->year_built,
                AssetProject::TOTAL_BUILDING_AREA => $request->total_building_area,
                AssetProject::NRSF => $request->nrsf,
                AssetProject::EXPECTED_CAPACITY => $request->expected_capacity,
                AssetProject::TARGET_TABLE => $request->target_table,
                AssetProject::CURRENT_PRICE => $request->current_price,
                AssetProject::PROJECT_HIGHLIGHTS_VI => $request->project_highlights_vi,
                AssetProject::PROJECT_HIGHLIGHTS_EN => $request->project_highlights_en,
                AssetProject::LONGITUDE => $request->longitude,
                AssetProject::LATITUDE => $request->latitude,
            ]);
        }
        return;
    }
}
