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
            'phone_number' => 'required',
            'identity' => 'required',
            'gender'    => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'birthday' => 'required',
            "date_identity" => "required",
            "address_identity" => "required",
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
            "bank_name.required" => __('auth.bank_name_not_null'),
            "account_number.required" => __('auth.account_number_not_null'),
            "account_name.required" => __('auth.account_name_not_null'),
            "identity.required" => __('auth.identity_not_null'),
            "date_identity.required" => __('auth.date_identity_not_null'),
            "address_identity.required" => __('auth.address_identity_not_null'),
        ];

    }
}