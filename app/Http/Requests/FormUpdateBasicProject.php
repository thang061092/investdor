<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormUpdateBasicProject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_name_vi' => 'required',
            'project_name_en' => 'required',
            'total_value_project' => 'required',
            'city_project' => 'required',
            'district_project' => 'required',
            'ward_project' => 'required',
            'address_project' => 'required',
            'total_part_project' => 'required',
            'value_part_project' => 'required',
            'description_project_vi' => 'required',
            'description_project_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "project_name_vi.required" => __('validate.project_name_vi_not_null'),
            "project_name_en.required" => __('validate.project_name_en_not_null'),
            "total_value_project.required" => __('validate.total_value_project_not_null'),
            "city_project.required" => __('validate.city_project_not_null'),
            "district_project.required" => __('validate.district_project_not_null'),
            "ward_project.required" => __('validate.ward_project_not_null'),
            "address_project.required" => __('validate.address_project_not_null'),
            "total_part_project.required" => __('validate.total_part_project_not_null'),
            "value_part_project.required" => __('validate.value_part_project_not_null'),
            "description_project_vi.required" => __('validate.description_project_vi_not_null'),
            "description_project_en.required" => __('validate.description_project_en_not_null'),
        ];

    }
}
