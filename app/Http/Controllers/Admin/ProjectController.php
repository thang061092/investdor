<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Requests\FormCreateProject;
use App\Http\Services\CityService;
use App\Http\Services\RealEstateProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends BaseController
{
    protected $cityService;
    protected $realEstateProjectService;

    public function __construct(CityService $cityService,
                                RealEstateProjectService $realEstateProjectService)
    {
        $this->cityService = $cityService;
        $this->realEstateProjectService = $realEstateProjectService;
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

    public function image($id)
    {
        $project = $this->realEstateProjectService->find($id);
        if ($project) {
            return view('employee.project.image', compact('project'));
        } else {
            toastr()->error(__("project.id_does_not_exist", ['id' => $id]));
            return redirect()->route('project.list');
        }
    }

    public function upload_image(Request $request)
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

}
