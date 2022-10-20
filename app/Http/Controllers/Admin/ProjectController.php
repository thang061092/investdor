<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    protected $projectService;
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    function index_create_project(){
        return view('employee.project.create_project');
    }


    public function create_new_project(Request $request)
    {

        $validate = $this->projectService->validate_create_new_project($request);

        if ($validate->fails()) {
            return response()->json([
                'status' => BaseController::HTTP_BAD_REQUEST,
                'message' => $validate->errors()->first()
            ]);
        } else {

            $project = $this->projectService->create_new_project($request);

            return response()->json([
                'status' => BaseController::HTTP_OK,
                'message' =>  __('message.success'),
            ]);
        }
    }


}
