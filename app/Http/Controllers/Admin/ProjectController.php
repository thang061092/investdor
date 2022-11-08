<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormAssetProject;
use App\Http\Requests\FormCreateProject;
use App\Http\Requests\FormExtendProject;
use App\Http\Requests\FormInvestorProject;
use App\Http\Requests\FormUpdateImageProject;
use App\Http\Services\CityService;
use App\Http\Services\DocumentProjectService;
use App\Http\Services\RealEstateProjectService;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;
    protected $documentProjectService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService,
                                DocumentProjectService $documentProjectService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
        $this->documentProjectService = $documentProjectService;
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
        try {
            $this->realEstateProjectService->create($request);
            toastr()->success(__('message.success'));
            return redirect()->route('project.list');
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            $cities = $this->cityService->city();
            return view('employee.project.create', compact('cities', 'error'));
        }
    }

    public function action(Request $request, $id)
    {
        $project = $this->realEstateProjectService->find($id);
        if ($project) {
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
            } else {
                return view('employee.project.detail', compact('project'));
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
            return redirect()->route('project.list');
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
            $this->realEstateProjectService->add_document($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
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
            $this->documentProjectService->update_document($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
        } catch (\Exception $exception) {
            $error = $exception->getMessage();
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $error);
        }
    }
}
