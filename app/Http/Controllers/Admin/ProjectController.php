<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormAssetProject;
use App\Http\Requests\FormCreateProject;
use App\Http\Requests\FormExtendProject;
use App\Http\Requests\FormInvestorProject;
use App\Http\Requests\FormUpdateBasicProject;
use App\Http\Requests\FormUpdateImageProject;
use App\Http\Services\BusinessPlanService;
use App\Http\Services\CityService;
use App\Http\Services\DistrictService;
use App\Http\Services\DocumentProjectService;
use App\Http\Services\RealEstateProjectService;
use App\Http\Services\WardService;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;
    protected $documentProjectService;
    protected $districtService;
    protected $wardService;
    protected $businessPlanService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService,
                                DocumentProjectService $documentProjectService,
                                DistrictService $districtService,
                                WardService $wardService,
                                BusinessPlanService $businessPlanService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
        $this->documentProjectService = $documentProjectService;
        $this->districtService = $districtService;
        $this->wardService = $wardService;
        $this->businessPlanService = $businessPlanService;
    }

    function index_create_project()
    {
        return view('employee.project.tem');
    }

    public function list(Request $request)
    {
        $projects = $this->realEstateProjectService->getAllPaginate($request);
        return view('employee.project.list', compact('projects'));
    }

    public function create(Request $request)
    {
        $cities = $this->cityService->city();
        return view('employee.project.create', compact('cities'));
    }

    public function create_post(FormCreateProject $request)
    {
        $cities = $this->cityService->city();
        try {
            $message = $this->realEstateProjectService->validate_create($request);
            if (count($message) > 0) {
                toastr()->error($message[0]);
                return redirect()->back()->withInput();
            } else {
                $this->realEstateProjectService->create($request);
                toastr()->success(__('message.success'));
                return redirect()->route('project.list');
            }
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return view('employee.project.create', compact('cities', 'error'));
        }
    }

    public function action(Request $request, $id)
    {
        $project = $this->realEstateProjectService->find($id);
        if ($project) {
            $cities = $this->cityService->city();
            $districts = $this->districtService->get_district_by_city($project['city_id']);
            $wards = $this->wardService->get_ward_by_district_id($project['district_id']);
            if ($request->action == 'image') {
                return view('employee.project.image', compact('project'));
            } elseif ($request->action == 'extend') {
                return view('employee.project.extend', compact('project'));
            } elseif ($request->action == 'document') {
                return view('employee.project.document', compact('project'));
            } elseif ($request->action == 'asset') {
                return view('employee.project.asset', compact('project'));
            } elseif ($request->action == 'investor') {
                return view('employee.project.investor', compact('project'));
            } elseif ($request->action == 'basic') {
                return view('employee.project.basic', compact('project', 'cities', 'districts', 'wards'));
            } elseif ($request->action == 'plan') {
                return view('employee.project.plan', compact('project'));
            } else {
                return view('employee.project.detail', compact('project', 'cities', 'districts', 'wards'));
            }
        } else {
            toastr()->error(__("project.id_does_not_exist", ['id' => $id]));
            return redirect()->route('project.list');
        }
    }

    public function upload_image(FormUpdateImageProject $request)
    {
        try {
            $this->realEstateProjectService->update_image($request);
            toastr()->success(__('message.success'));
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $error);
        }
    }

    public function update_extend(FormExtendProject $request)
    {
        try {
            $this->realEstateProjectService->update_extend($request);
            toastr()->success(__('message.success'));
            return redirect()->route('project.list');
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            toastr()->error($error);
            return redirect()->route('project.list');
        }
    }

    public function update_asset(FormAssetProject $request)
    {
        try {
            $this->realEstateProjectService->update_asset($request);
            toastr()->success(__('message.success'));
            return redirect()->route('project.list');
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            toastr()->error($error);
            return back()->withInput();
        }
    }

    public function update_investor(FormInvestorProject $request)
    {
        try {
            $this->realEstateProjectService->update_investor($request);
            toastr()->success(__('message.success'));
            return redirect()->route('project.list');
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            toastr()->error($error);
            return redirect()->route('project.list');
        }
    }

    public function add_document(Request $request)
    {
        try {
            $validate = $this->realEstateProjectService->validate_add_document($request);
            if ($validate->fails()) {
                return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
            } else {
                $message = $this->documentProjectService->check_validate_update_document($request);
                if (count($message) > 0) {
                    return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $message[0]);
                } else {
                    $this->realEstateProjectService->add_document($request);
                    return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
                }
            }
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $error);
        }
    }

    public function show_document($id)
    {
        $document = $this->documentProjectService->find($id);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $document);
    }

    public function update_document(Request $request)
    {
        try {
            $validate = $this->documentProjectService->validate_update_document($request);
            if ($validate->fails()) {
                return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
            } else {
                $this->documentProjectService->update_document($request);
                return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
            }
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $error);
        }
    }

    public function add_member_company(Request $request)
    {
        try {
            $validate = $this->realEstateProjectService->validate_add_member_company($request);
            if ($validate->fails()) {
                return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
            } else {
                $message = $this->realEstateProjectService->check_validate_add_member_company($request);
                if (count($message) > 0) {
                    return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $message[0]);
                } else {
                    $this->realEstateProjectService->add_member_company($request);
                    toastr()->success(__('message.success'));
                    return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
                }
            }
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $error);
        }
    }

    public function update_post(FormUpdateBasicProject $request, $id)
    {
        try {
            $message = $this->realEstateProjectService->validate_update($request, $id);
            if (count($message) > 0) {
                toastr()->error($message[0]);
                return redirect()->back()->withInput();
            } else {
                $this->realEstateProjectService->update($request, $id);
                toastr()->success(__('message.success'));
                return redirect()->route('project.list');
            }
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            toastr()->error($error);
            return redirect()->route('project.list');
        }
    }

    public function update_status_project(Request $request, $id)
    {
        try {
            $this->realEstateProjectService->update_status_project($request, $id);
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $error);
        }
    }

    public function add_plan(Request $request)
    {
        try {
            $validate = $this->realEstateProjectService->validate_add_plan($request);
            if ($validate->fails()) {
                return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
            } else {
                $this->realEstateProjectService->add_plan($request);
                return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
            }
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $error);
        }
    }

    public function show_plan($id)
    {
        $plan = $this->businessPlanService->find($id);
        return BaseController::send_response(BaseController::HTTP_OK, __('message.success'), $plan);
    }

    public function update_plan(Request $request)
    {
        try {
            $validate = $this->businessPlanService->validate_update_plan($request);
            if ($validate->fails()) {
                return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
            } else {
                $this->businessPlanService->update_plan($request);
                return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
            }
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $error);
        }
    }
}
