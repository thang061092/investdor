<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormCreateEmployee extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'full_name' => 'required',
            'password'  => 'required',
            'file'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            "email.required" => __('auth.email_not_null'),
            "email.email" => __('auth.email_malformed'),
            "email.unique" => __('auth.email_unique'),
            "full_name.required" => __('auth.name_not_null'),
            "password.required" => __('auth.password_not_null'),
            "file.required" => __('auth.image_employee_not_null'),
        ];

    }
}