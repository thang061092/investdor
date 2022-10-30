<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Http\Services\ImageGalleryService;
use App\Http\Services\ProjectService;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    protected $projectService;
    protected $imageGalleryService;

    public function __construct(ProjectService $projectService,
                                ImageGalleryService $imageGalleryService)
    {
        $this->projectService = $projectService;
        $this->imageGalleryService = $imageGalleryService;
    }

    function index_create_project()
    {
        return view('employee.project.create');
    }

    public function create_new_project(Request $request)
    {

        $validate = $this->projectService->validate_create_new_project($request);

        if ($validate->fails()) {
            return BaseController::send_response(BaseController::HTTP_BAD_REQUEST, $validate->errors()->first());
        } else {
            $project = $this->projectService->create_new_project($request);

            if (!empty($project)) {
                $this->imageGalleryService->create_image_gallery_project($project['id'], $request->image_gallery);
            }
            return BaseController::send_response(BaseController::HTTP_OK, __('message.success'));
        }
    }

}
