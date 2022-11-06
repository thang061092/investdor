<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormInvestorProject extends FormRequest
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
            'name_company_vi' => 'required',
            'address_vi' => 'required',
            'description_vi' => 'required',
            'description_en' => 'required',
            'id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "name_company_vi.required" => __('validate.name_company_vi_not_null'),
            "address_vi.required" => __('validate.address_vi_not_null'),
            "description_vi.required" => __('validate.description_vi_not_null'),
            "description_en.required" => __('validate.description_en_not_null'),
            "id.required" => __('validate.id_project_not_null'),
        ];

    }
}
