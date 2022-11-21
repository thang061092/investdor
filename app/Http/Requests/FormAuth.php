<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormAuth extends FormRequest
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
            'img_before' => 'required',
            'img_after' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "img_before.required" => __('auth.img_cmt_before_not_null'),
            "img_after.required" => __('auth.img_cmt_after_not_null'),
        ];

    }
}