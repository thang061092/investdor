<?php


namespace App\Http\Services;


use App\Http\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Validator;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    function validate_create_new_project($request){

        $validate = Validator::make($request->all(), [
            'describe_project' => 'required',
            'project_name' => 'required',
            'type_of_real_estate' => 'required',
            'project_address' => 'required',
            'total_number_of_parts' => 'required|regex:/^[0-9]$/',
            'expected_profit' => 'required|regex:/^[0-9]$/',

        ], [
            "project_name.required" => __('message.project_name_not_null'),
            "type_of_real_estate.required" => __('message.type_of_real_estate_not_null'),
            "project_address.required" => __('message.project_address_not_null'),
            "total_number_of_parts.required" => __('message.total_number_of_parts_not_null'),
            "total_number_of_parts.regex" => __('message.total_number_of_parts_regex'),
            "expected_profit.required" => __('message.expected_profit_not_null'),
            "expected_profit.regex" => __('message.expected_profit_regex'),
            "describe_project.required" => __('message.describe_project_not_null'),

        ]);

        return $validate;

    }

    public function create_new_project($request){

    }


}
