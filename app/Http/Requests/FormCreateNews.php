<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FormCreateNews extends FormRequest
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
            'title' => 'required',
            'category' => 'required',
            'content'  => 'required',
            // 'img_news'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            "title.required" => __('auth.title_not_null'),
            "category.required" => __('auth.category_not_null'),
            "content.required" => __('auth.content_not_null'),
            // "img_news.required" => __('auth.image_news_not_null'),
        ];

    }
}