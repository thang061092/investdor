<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormQuestion extends FormRequest
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
            'name_user' => 'required',
            'email_user' => 'required|email',
            'question' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "name_user.required" => __('auth.name_not_null'),
            "email_user.required" => __('auth.email_not_null'),
            "email_user.email" => __('auth.email_malformed'),
            'question.required' => __('auth.question_not_null'),
        ];

    }
}