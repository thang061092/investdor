<?php

namespace App\Http\Services;

use App\Http\Repositories\ProjectRepository;
use App\Models\Projects;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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
            'total_number_of_parts' => 'required|regex:/^\d+$/',
            'expected_profit' => 'required|regex:/^\d+$/',
            'image_avatar' => 'required',
            'year_built' => 'required|regex:/^\d+$/',
            'total_building_area' => 'required|regex:/^\d+$/',
            'expected_capacity' => 'required|regex:/^\d+$/',
            'target_stable_return_on_cost' => 'required|regex:/^\d+$/',
            'project_highlights' => 'required',
            'project_location_description' => 'required',

        ], [
            "project_name.required" => __('message.project_name_not_null'),
            "type_of_real_estate.required" => __('message.type_of_real_estate_not_null'),
            "project_address.required" => __('message.project_address_not_null'),
            "total_number_of_parts.required" => __('message.total_number_of_parts_not_null'),
            "total_number_of_parts.regex" => __('message.total_number_of_parts_regex'),
            "expected_profit.required" => __('message.expected_profit_not_null'),
            "expected_profit.regex" => __('message.expected_profit_regex'),
            "describe_project.required" => __('message.describe_project_not_null'),
            "image_avatar.required" => __('message.image_avatar_required'),
            "year_built.required" => __('message.year_built_required'),
            "year_built.regex" => __('message.year_built_regex'),
            "total_building_area.required" => __('message.total_building_area_required'),
            "total_building_area.regex" => __('message.total_building_area_regex'),
            "expected_capacity.regex" => __('message.expected_capacity_regex'),
            "expected_capacity.required" => __('message.expected_capacity_required'),
            "target_stable_return_on_cost.required" => __('message.target_stable_return_on_cost_required'),
            "target_stable_return_on_cost.regex" => __('message.target_stable_return_on_cost_regex'),
            "cost_so_far.required" => __('message.cost_so_far_required'),
            "cost_so_far.regex" => __('message.cost_so_far_regex'),
            "project_highlights.required" => __('message.project_highlights_required'),
            "project_location_description.required" => __('message.project_location_description_required'),

        ]);

        return $validate;

    }

    public function create_new_project($request){
        $data = [
            Projects::STATUS => $request->status,
            Projects::PROJECT_NAME => $request->project_name,
            Projects::TYPE_OF_REAL_ESTATE => $request->type_of_real_estate,
            Projects::PROJECT_ADDRESS => $request->project_address,
            Projects::TOTAL_NUMBER_OF_PARTS => $request->total_number_of_parts,
            Projects::EXPECTED_PROFIT => $request->expected_profit,
            Projects::DESCRIBE_PROJECT => $request->describe_project,
            Projects::PRICE => $request->price,
            Projects::PROJECT_OVERVIEW => $request->project_overview,
            Projects::PROJECT_SITE_OVERVIEW => $request->project_site_overview,
            Projects::MARKET_OVERVIEW => $request->market_overview,
            Projects::PLATFORM_OVERVIEW => $request->platform_overview,
            Projects::IMAGE_AVATAR => $request->image_avatar,
            Projects::YEAR_BUILT => $request->year_built,
            Projects::TOTAL_BUILDING_AREA => $request->total_building_area,
            Projects::NRSF => $request->nrsf,
            Projects::EXPECTED_CAPACITY => $request->expected_capacity,
            Projects::TARGET_STABLE_RETURN_ON_COST => $request->target_stable_return_on_cost,
            Projects::COST_SO_FAR => $request->cost_so_far,
            Projects::PROJECT_HIGHLIGHTS => $request->project_highlights,
            Projects::PROJECT_LOCATION_DESCRIPTION => $request->project_location_description,
        ];
        return $this->projectRepository->create($data);
    }


}
