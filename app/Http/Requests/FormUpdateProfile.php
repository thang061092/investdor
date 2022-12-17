<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FormUpdateProfile extends FormRequest
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
    protected $id;
    public function __construct(Request $request)
    {
        $this->id = (integer) $request->session()->get('customer')['id'];
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
            'birthday' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|numeric|digits:10|unique:users,phone,'.$this->id,
            'bank_name' => 'required',
            'account_number' => 'required|numeric',
            'account_name' => 'required',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'identity' => 'required|numeric|unique:users,identity,'.$this->id,
            'identity' => 'regex:/^\d{9}(?:\d{3})?$/',
            "date_identity" => "required",
            "address_identity" => "required",
            'specific_address' => "required",
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
            "phone_number.numeric" => __('auth.phone_number_not_format'),
            "phone_number.digits" => __('auth.phone_number_max'),
            "phone_number.unique" => __('auth.phone_number_unique'),
            "bank_name.required" => __('auth.bank_name_not_null'),
            "account_number.required" => __('auth.account_number_not_null'),
            "account_number.numeric" => __('auth.account_number_not_format'),
            "account_name.required" => __('auth.account_name_not_null'),
            "province.required" => __('auth.province_not_null'),
            "district.required" => __('auth.district_not_null'),
            "ward.required" => __('auth.ward_not_null'),
            "identity.required" => __('auth.identity_not_null'),
            "identity.numeric" => __('auth.identity_not_format'),
            "identity.unique" => __('auth.identity_unique'),
            "identity.regex" => __('auth.identity_max'),
            "date_identity.required" => __('auth.date_identity_not_null'),
            "address_identity.required" => __('auth.address_identity_not_null'),
            'specific_address.required' => __('auth.specific_address_not_null'),
        ];

    }
}