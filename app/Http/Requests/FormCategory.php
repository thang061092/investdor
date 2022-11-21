<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormCategory extends FormRequest
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
            'name_category_vi' => 'required',
            'desc_category_vi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "name_category_vi.required" => __('auth.name_category_not_null'),
            "desc_category_vi.required" => __('auth.desc_category_not_null'),
        ];

    }
}