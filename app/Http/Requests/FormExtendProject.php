<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormExtendProject extends FormRequest
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
            'description_project_vi' => 'required',
            'description_project_en' => 'required',
            'address_project_vi' => 'required',
            'address_project_en' => 'required',
            'market_project_vi' => 'required',
            'market_project_en' => 'required',
            'background_project_vi' => 'required',
            'background_project_en' => 'required',
            'id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "description_project_vi.required" => __('validate.description_project_vi_not_null'),
            "description_project_en.required" => __('validate.description_project_en_not_null'),
            "address_project_vi.required" => __('validate.address_project_vi_not_null'),
            "address_project_en.required" => __('validate.address_project_en_not_null'),
            "market_project_vi.required" => __('validate.market_project_vi_not_null'),
            "market_project_en.required" => __('validate.market_project_en_not_null'),
            "background_project_vi.required" => __('validate.background_project_vi_not_null'),
            "background_project_en.required" => __('validate.background_project_en_not_null'),
            "id.required" => __('validate.id_project_not_null'),
        ];

    }
}
