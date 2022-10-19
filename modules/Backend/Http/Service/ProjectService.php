<?php


namespace Modules\Backend\Http\Service;


use Illuminate\Support\Facades\Validator;
use Modules\Backend\Http\Repository\ProjectRepository;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    function validate_create_new_project($request){

        $validate = Validator::make($request->all(), [
            'project_name' => 'required',
        ], [
            "project_name.required" => __('Backend::message.project_name_not_null'),

        ]);
        return $validate;


    }


}
