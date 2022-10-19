<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Http\Service\ProjectService;
use Modules\Mysql\Controller\BaseController;

class ProjectController extends BaseController
{

    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index_create_project()
    {
        return view('frontend::admin_employee.create_project');
    }

    public function create_project(Request $request)
    {
        $validate = $this->projectService->validate_create_new_project($request);
        if ($validate->fails()) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $user = $this->userService->create_employee($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $user);
        }

    }


}
