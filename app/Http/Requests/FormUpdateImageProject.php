<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormUpdateImageProject extends FormRequest
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
            'id' => 'required',
            'anh_dai_dien' => 'required',
            'img_project' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "id.required" => __('project.id_not_null'),
            "anh_dai_dien.required" => __('project.image_avatar_project_not_null'),
            "img_project.required" => __('project.project_photo_not_null'),
        ];

    }
}
