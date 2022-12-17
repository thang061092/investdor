<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormUpdateEmployee extends FormRequest
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
            'email' => 'required|email',
            'full_name' => 'required',
            'phone_number' => 'required|numeric|digits:10',
            'phone_number' => 'unique:users,phone,' . $this->users['id'],
            'gender'    => 'required',
            'birthday' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "email.required" => __('auth.email_not_null'),
            "email.email" => __('auth.email_malformed'),
            "full_name.required" => __('auth.name_not_null'),
            "birthday.required" => __('auth.birthday_not_null'),
            "gender.required" => __('auth.gender_not_null'),
            "phone_number.required" => __('auth.phone_number_not_null'),
            "phone_number.digits" => __('auth.phone_number_max'),
            "phone_number.numeric" => __('auth.phone_number_not_format'),
            "phone_number.unique" => __('auth.phone_number_unique'),
        ];

    }
}