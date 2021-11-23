<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required'],
            'description' => ['required'],
            'images' => ['required'],
            'images.*' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:4096'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "製品名が空でない。",
            'description.required' => '説明が空ではない。',
            'images.required' => 'イメージが空ではない。',
            'images.*.mimes' => 'イメージはjpg,png,jpeg,gif,svgです。',
            'images.*.max' => 'イメージのサイズは2048を超えてはなりません。',
            'images.*.image' => '画像である必要があります。'
        ];
    }
}
