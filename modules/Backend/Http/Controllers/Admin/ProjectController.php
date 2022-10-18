<?php


namespace Modules\Backend\Http\Controllers\Admin;


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

    public function create_new_project(Request $request){

        $validate = $this->projectService->validate_create_new_project($request);

        if ($validate->fails()) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $user = $this->userService->create_employee($request);
            return BaseController::send_response(BaseController::HTTP_OK, __('Backend::message.success'), $user);
        }


    }


}
