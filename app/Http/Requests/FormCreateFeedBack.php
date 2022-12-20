<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormCreateFeedBack extends FormRequest
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
            'full_name' => 'required',
            'job_en' => 'required',
            'job_vi' => 'required',
            'feedback_vi'  => 'required',
            'feedback_en'  => 'required',
            // 'avatar'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            "full_name.required" => __('auth.name_not_null'),
            "job_en.required" => __('auth.job_not_null'),
            "job_vi.required" => __('auth.job_not_null'),
            "feedback_vi.required" => __('auth.feedback_not_null'),
            "feedback_en.required" => __('auth.feedback_not_null'),
            // "avatar.required" => __('auth.image_news_not_null'),
        ];

    }
}