<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormAssetProject extends FormRequest
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
            'year_built' => 'required',
            'total_building_area' => 'required',
            'nrsf' => 'required',
            'expected_capacity' => 'required',
            'target_table' => 'required',
            'current_price' => 'required',
            'project_highlights_vi' => 'required',
            'project_highlights_en' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "year_built.required" => __('validate.year_built_not_null'),
            "total_building_area.required" => __('validate.total_building_area_not_null'),
            "nrsf.required" => __('validate.nsrf_not_null'),
            "expected_capacity.required" => __('validate.expected_capacity_not_null'),
            "target_table.required" => __('validate.target_table_not_null'),
            "current_price.required" => __('validate.current_price_not_null'),
            "project_highlights_vi.required" => __('validate.project_highlights_vi_not_null'),
            "project_highlights_en.required" => __('validate.project_highlights_en_not_null'),
            "longitude.required" => __('validate.longitude_not_null'),
            "latitude.required" => __('validate.latitude_not_null'),
        ];

    }
}
