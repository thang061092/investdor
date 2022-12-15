<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormCreatePost extends FormRequest
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
            'title_vi' => 'required',
            'title_en' => 'required',
            'content_vi' => 'required',
            'content_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "title_vi.required" => __('auth.title_not_null'),
            "title_en.required" => __('auth.title_not_null'),
            "content_vi.required" => __('auth.content_not_null'),
            "content_en.required" => __('auth.content_not_null'),
        ];

    }
}
