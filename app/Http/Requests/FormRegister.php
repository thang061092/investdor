<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormRegister extends FormRequest
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',
            'full_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            "email.required" => __('auth.email_not_null'),
            "email.email" => __('auth.email_malformed'),
            "email.unique" => __('auth.email_exist'),
            "password.required" => __('auth.password_not_null'),
            "full_name.required" => __('auth.name_not_null'),
            "password_confirmation.required" => __('auth.repassword_not_null'),
            "password.min" => __('auth.password_min'),
            "password_confirmation.min" => __('auth.password_min'),
        ];

    }
}
