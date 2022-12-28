<?php


namespace App\Http\Services;


use App\Http\Repositories\AssetProjectRepository;
use App\Http\Repositories\BusinessPlanRepository;
use App\Http\Repositories\ContractRepository;
use App\Http\Repositories\DocumentProjectRepository;
use App\Http\Repositories\ImageProjectRepository;
use App\Http\Repositories\InterestRepository;
use App\Http\Repositories\InvestorProjectRepository;
use App\Http\Repositories\MemberCompanyRepository;
use App\Http\Repositories\OverviewRepository;
use App\Http\Repositories\RealEstateProjectRepository;
use App\Http\Repositories\UserRepository;
use App\Models\AssetProject;
use App\Models\Bills;
use App\Models\BusinessPlane;
use App\Models\Contract;
use App\Models\DocumentProject;
use App\Models\ImageProject;
use App\Models\Interest;
use App\Models\InvestorProject;
use App\Models\MemberCompany;
use App\Models\OverviewProject;
use App\Models\RealEstateProject;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RealEstateProjectService
{
    protected $estateProjectRepository;
    protected $interestService;
    protected $imageProjectRepository;
    protected $overviewRepository;
    protected $assetProjectRepository;
    protected $investorProjectRepository;
    protected $documentProjectRepository;
    protected $uploadService;
    protected $memberCompanyRepository;
    protected $interestRepository;
    protected $businessPlanRepository;
    protected $contractRepository;
    protected $billsService;
    protected $userRepository;

    public function __construct(RealEstateProjectRepository $estateProjectRepository,
                                InterestService $interestService,
                                ImageProjectRepository $imageProjectRepository,
                                OverviewRepository $overviewRepository,
                                AssetProjectRepository $assetProjectRepository,
                                InvestorProjectRepository $investorProjectRepository,
                                DocumentProjectRepository $documentProjectRepository,
                                UploadService $uploadService,
                                MemberCompanyRepository $memberCompanyRepository,
                                InterestRepository $interestRepository,
                                BusinessPlanRepository $businessPlanRepository,
                                ContractRepository $contractRepository,
                                BillsService $billsService,
                                UserRepository $userRepository)
    {
        $this->estateProjectRepository = $estateProjectRepository;
        $this->interestService = $interestService;
        $this->imageProjectRepository = $imageProjectRepository;
        $this->overviewRepository = $overviewRepository;
        $this->assetProjectRepository = $assetProjectRepository;
        $this->investorProjectRepository = $investorProjectRepository;
        $this->documentProjectRepository = $documentProjectRepository;
        $this->uploadService = $uploadService;
        $this->memberCompanyRepository = $memberCompanyRepository;
        $this->interestRepository = $interestRepository;
        $this->businessPlanRepository = $businessPlanRepository;
        $this->contractRepository = $contractRepository;
        $this->billsService = $billsService;
        $this->userRepository = $userRepository;
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
            RealEstateProject::TOTAL_VALUE => !empty($request->total_value_project) ? convert_text_number($request->total_value_project) : null,
            RealEstateProject::PART => !empty($request->total_part_project) ? convert_text_number($request->total_part_project) : null,
            RealEstateProject::VALUE_PART => !empty($request->value_part_project) ? convert_text_number($request->value_part_project) : null,
            RealEstateProject::DESCRIPTION_VI => $request->description_project_vi ?? null,
            RealEstateProject::DESCRIPTION_EN => $request->description_project_en ?? null,
            RealEstateProject::TYPE => $request->type_project ?? null,
            RealEstateProject::STATUS => RealEstateProject::NEW,
            RealEstateProject::CREATED_BY => Session::get('employee')['email'] ?? null,
            RealEstateProject::CURRENT_PART => !empty($request->total_part_project) ? convert_text_number($request->total_part_project) : null,
        ];
        $project = $this->estateProjectRepository->create($data);
        $this->interestRepository->create([
            Interest::REAL_ESTATE_PROJECT_ID => $project['id'],
            Interest::STATUS => Interest::ACTIVE,
            Interest::INTEREST => $request->interest,
            Interest::PERIOD => $request->month_project
        ]);
        return $project;
    }

    public function getAllPaginate($request)
    {
        return $this->estateProjectRepository->getAllPaginate($request);
    }

    public function list_project_investor($request)
    {
        if (!empty($request->status)) {
            $request->arr_status = is_array($request->status) ? $request->status : explode(',', $request->status);
        }
        if (!empty($request->investment)) {
            $arr_project_user = $this->contractRepository
                ->findMany([Contract::USER_ID => Session::get('customer')['id']])
                ->pluck(Contract::REAL_ESTATE_PROJECT_ID)
                ->toArray();
            $request->arr_project_user = array_unique($arr_project_user);
        }
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
                AssetProject::TOTAL_BUILDING_AREA => convert_text_number($request->total_building_area),
                AssetProject::NRSF => convert_text_number($request->nrsf),
                AssetProject::EXPECTED_CAPACITY => convert_text_number($request->expected_capacity),
                AssetProject::TARGET_TABLE => convert_text_number($request->target_table),
                AssetProject::CURRENT_PRICE => convert_text_number($request->current_price),
                AssetProject::PROJECT_HIGHLIGHTS_VI => $request->project_highlights_vi,
                AssetProject::PROJECT_HIGHLIGHTS_EN => $request->project_highlights_en,
                AssetProject::LONGITUDE => $request->longitude,
                AssetProject::LATITUDE => $request->latitude,
                AssetProject::REAL_ESTATE_PROJECT_ID => $request->id
            ]);
        } else {
            $this->assetProjectRepository->update($asset['id'], [
                AssetProject::YEAR_BUILT => $request->year_built,
                AssetProject::TOTAL_BUILDING_AREA => convert_text_number($request->total_building_area),
                AssetProject::NRSF => convert_text_number($request->nrsf),
                AssetProject::EXPECTED_CAPACITY => convert_text_number($request->expected_capacity),
                AssetProject::TARGET_TABLE => convert_text_number($request->target_table),
                AssetProject::CURRENT_PRICE => convert_text_number($request->current_price),
                AssetProject::PROJECT_HIGHLIGHTS_VI => $request->project_highlights_vi,
                AssetProject::PROJECT_HIGHLIGHTS_EN => $request->project_highlights_en,
                AssetProject::LONGITUDE => $request->longitude,
                AssetProject::LATITUDE => $request->latitude,
            ]);
        }
        return;
    }

    public function update_investor($request)
    {
        $investor = $this->investorProjectRepository->findOne([InvestorProject::REAL_ESTATE_PROJECT_ID => $request->id]);
        if (!$investor) {
            $this->investorProjectRepository->create([
                InvestorProject::NAME_COMPANY_VI => $request->name_company_vi,
                InvestorProject::ADDRESS_VI => $request->address_vi,
                InvestorProject::DESCRIPTION_VI => $request->description_vi,
                InvestorProject::DESCRIPTION_EN => $request->description_en,
                InvestorProject::REAL_ESTATE_PROJECT_ID => $request->id
            ]);
        } else {
            $this->investorProjectRepository->update($investor['id'], [
                InvestorProject::NAME_COMPANY_VI => $request->name_company_vi,
                InvestorProject::ADDRESS_VI => $request->address_vi,
                InvestorProject::DESCRIPTION_VI => $request->description_vi,
                InvestorProject::DESCRIPTION_EN => $request->description_en,
                InvestorProject::REAL_ESTATE_PROJECT_ID => $request->id
            ]);
        }
        return;
    }

    public function add_document($request)
    {
        if ($request->hasFile('file')) {
            $file = $this->uploadService->upload($request);
        }
        $this->documentProjectRepository->create([
            DocumentProject::REAL_ESTATE_PROJECT_ID => $request->id,
            DocumentProject::TITLE_VI => $request->title_vi,
            DocumentProject::TITLE_EN => $request->title_en,
            DocumentProject::NAME_FILE_VI => $request->name_file_vi,
            DocumentProject::NAME_FILE_EN => $request->name_file_en,
            DocumentProject::SLUG_VI => slugify($request->title_vi),
            DocumentProject::SLUG_EN => slugify($request->title_en),
            DocumentProject::LINK => $file ?? "",
            DocumentProject::STATUS => DocumentProject::ACTIVE
        ]);
        return;
    }

    public function add_member_company($request)
    {
        if ($request->hasFile('avatar')) {
            $file = $this->uploadService->upload_param($request->avatar);
        }
        $this->memberCompanyRepository->create([
            MemberCompany::NAME_MEMBER => $request->name_member,
            MemberCompany::POSITION_MEMBER_VI => $request->position_member_vi,
            MemberCompany::POSITION_MEMBER_EN => $request->position_member_en,
            MemberCompany::AVATAR_MEMBER => $file ?? '',
            MemberCompany::INVESTOR_PROJECT_ID => $request->investor_project_id
        ]);
        return;
    }

    public function update($request, $id)
    {
        $project = $this->estateProjectRepository->find($id);
        $data = [
            RealEstateProject::NAME_VI => $request->project_name_vi ?? null,
            RealEstateProject::NAME_EN => $request->project_name_en ?? null,
            RealEstateProject::SLUG_VI => slugify($request->project_name_vi),
            RealEstateProject::SLUG_EN => slugify($request->project_name_en),
            RealEstateProject::CITY_ID => $request->city_project ?? null,
            RealEstateProject::DISTRICT_ID => $request->district_project ?? null,
            RealEstateProject::WARD_ID => $request->ward_project ?? null,
            RealEstateProject::ADDRESS_VI => $request->address_project ?? null,
            RealEstateProject::TOTAL_VALUE => !empty($request->total_value_project) ? trim(str_replace(array(',', '.',), '', $request->total_value_project)) : null,
//            RealEstateProject::PART => !empty($request->total_part_project) ? trim(str_replace(array(',', '.',), '', $request->total_part_project)) : null,
//            RealEstateProject::VALUE_PART => !empty($request->value_part_project) ? trim(str_replace(array(',', '.',), '', $request->value_part_project)) : null,
            RealEstateProject::DESCRIPTION_VI => $request->description_project_vi ?? null,
            RealEstateProject::DESCRIPTION_EN => $request->description_project_en ?? null,
            RealEstateProject::UPDATED_BY => Session::get('employee')['email'] ?? null
        ];

        if ($project['status'] == RealEstateProject::NEW) {
//            $data[RealEstateProject::TOTAL_VALUE] = !empty($request->total_value_project) ? trim(str_replace(array(',', '.',), '', $request->total_value_project)) : null;
            $data[RealEstateProject::PART] = !empty($request->total_part_project) ? trim(str_replace(array(',', '.',), '', $request->total_part_project)) : null;
            $data[RealEstateProject::VALUE_PART] = !empty($request->value_part_project) ? trim(str_replace(array(',', '.',), '', $request->value_part_project)) : null;
        }
        $project_new = $this->estateProjectRepository->update($id, $data);
        return $project_new;
    }

    public function update_status_project($request, $id)
    {
        $this->estateProjectRepository->update($id, [
            RealEstateProject::STATUS => $request->status
        ]);
        return;
    }

    public function validate_create($request)
    {
        $message = [];
        $project_slug_vi = $this->estateProjectRepository->findOne(['slug_vi' => slugify($request->project_name_vi)]);
        if ($project_slug_vi) {
            $message[] = __('validate.project_name_already_exists');
        }
        $project_slug_en = $this->estateProjectRepository->findOne(['slug_vi' => slugify($request->project_name_en)]);
        if ($project_slug_en) {
            $message[] = __('validate.project_name_already_exists');
        }
        return $message;
    }

    public function validate_update($request, $id)
    {
        $message = [];
        $project_slug_vi = $this->estateProjectRepository->findOne(['slug_vi' => slugify($request->project_name_vi)]);
        if ($project_slug_vi && $project_slug_vi['id'] != $id) {
            $message[] = __('validate.project_name_already_exists');
        }
        $project_slug_en = $this->estateProjectRepository->findOne(['slug_vi' => slugify($request->project_name_en)]);
        if ($project_slug_en && $project_slug_vi['id'] != $id) {
            $message[] = __('validate.project_name_already_exists');
        }

        $project = $this->estateProjectRepository->find($id);
        if ($project['status'] == RealEstateProject::NEW) {
            if (empty($request->total_part_project)) {
                $message[] = __('validate.total_part_project_not_null');
            }
            if (empty($request->value_part_project)) {
                $message[] = __('validate.value_part_project_not_null');
            }
        }
        return $message;
    }

    public function add_plan($request)
    {
        $this->businessPlanRepository->create([
            BusinessPlane::REAL_ESTATE_PROJECT_ID => $request->id,
            BusinessPlane::TITLE_VI => $request->title_vi,
            BusinessPlane::TITLE_EN => $request->title_en,
            BusinessPlane::SLUG_VI => slugify($request->title_vi),
            BusinessPlane::SLUG_EN => slugify($request->title_en),
            BusinessPlane::DESCRIPTION_VI => $request->description_vi,
            BusinessPlane::DESCRIPTION_EN => $request->description_en,
            BusinessPlane::STATUS => BusinessPlane::ACTIVE
        ]);
        return;
    }

    public function validate_add_plan($request)
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

    public function validate_add_document($request)
    {
        $validate = Validator::make($request->all(), [
            'title_vi' => 'required',
            'title_en' => 'required',
            'name_file_vi' => 'required',
            'name_file_en' => 'required',
        ], [
            'title_vi.required' => __('validate.title_vi_not_null'),
            'title_en.required' => __('validate.title_en_not_null'),
            'name_file_vi.required' => __('validate.name_file_not_nul'),
            'name_file_en.required' => __('validate.name_file_not_nul'),
        ]);
        return $validate;
    }

    public function validate_step1($request)
    {
        $message = [];
        if (empty($request->project_id)) {
            $message[] = __('validate.id_project_not_null');
            return $message;
        }

        if (!empty($request->phone_number)) {
            $user = $this->userRepository->findOne([Users::PHONE => $request->phone_number]);
            if ($user && $user['id'] != Session::get('customer')['id']) {
                $message[] = __('auth.phone_number_unique');
                return $message;
            }
        } else {
            $message[] = __('auth.phone_number_not_null');
        }

        if (empty($request->bank_name)) {
            $message[] = __('auth.bank_name_not_null');
        }

        if (empty($request->account_number)) {
            $message[] = __('auth.account_number_not_null');
        }

        if (empty($request->account_name)) {
            $message[] = __('auth.account_name_not_null');
        }
        return $message;
    }

    public function validate_step2($request)
    {
        $message = [];
        if (empty($request->checksum)) {
            $message[] = __('validate.request_illegal');
            return $message;
        } else {
            $checksum = Authorization::validateToken($request->checksum);
            if (!$checksum) {
                $message[] = __('validate.request_illegal');
                return $message;
            } else {
                $bill = $this->billsService->find($checksum->bill_id);
                if (!$bill) {
                    $message[] = __('validate.request_illegal');
                    return $message;
                } else {
                    if ($bill['user_id'] != Session::get('customer')['id']) {
                        $message[] = __('validate.request_illegal');
                        return $message;
                    }
                    if ($bill['status'] != Bills::NEW) {
                        $message[] = __('validate.request_illegal');
                        return $message;
                    }
                }
            }
        }

        if (empty($request->part_investment)) {
            $message[] = __('validate.part_investment_not_nul');
            return $message;
        } else {
            if ($request->part_investment < 10) {
                $message[] = __('validate.part_min', ['part' => 10]);
                return $message;
            }
        }
        return $message;
    }

    public function validate_step3($request)
    {
        $message = [];
        if (empty($request->checksum)) {
            $message[] = __('validate.request_illegal');
            return $message;
        } else {
            $checksum = Authorization::validateToken($request->checksum);
            if (!$checksum) {
                $message[] = __('validate.request_illegal');
                return $message;
            } else {
                $bill = $this->billsService->find($checksum->bill_id);
                if (!$bill) {
                    $message[] = __('validate.request_illegal');
                    return $message;
                } else {
                    if ($bill['user_id'] != Session::get('customer')['id']) {
                        $message[] = __('validate.request_illegal');
                        return $message;
                    }
                    if ($bill['status'] != Bills::NEW) {
                        $message[] = __('validate.request_illegal');
                        return $message;
                    }
                }
            }
        }

        if (empty($request->agree)) {
            $message[] = __('validate.agree');
            return $message;
        } else {
            if ($request->agree != 'agree') {
                $message[] = __('validate.agree');
                return $message;
            }
        }
        return $message;
    }

    public function list_project_index($request)
    {
        $projects = $this->estateProjectRepository->list_project_index($request);
        return $projects;
    }

    public function validate_add_member_company($request)
    {
        $validate = Validator::make($request->all(), [
            'name_member' => 'required',
            'position_member_vi' => 'required',
            'position_member_en' => 'required',
            'investor_project_id' => 'required',
        ], [
            'name_member.required' => __('validate.name_member_not_null'),
            'position_member_vi.required' => __('validate.position_member_not_null'),
            'position_member_en.required' => __('validate.position_member_not_null'),
            'investor_project_id.required' => __('validate.investor_project_id_not_null'),
        ]);
        return $validate;
    }

    public function check_validate_add_member_company($request)
    {
        $message = [];
        if (!$request->hasFile('avatar')) {
            $message[] = __('validate.avatar_not_null');
        }

        return $message;
    }

}
