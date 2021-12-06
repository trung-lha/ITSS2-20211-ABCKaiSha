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
            'name.required' => "製品名を入力してください",
            'description.required' => '説明を入力してください',
            'images.required' => 'イメージをアップロードしてください',
            'images.*.mimes' => '画像拡張子は「jpg, png, jpeg, gif, svg」が必要です',
            'images.*.max' => 'イメージのサイズは4096超えできません',
            'images.*.image' => 'イメージ以外はアップロードができません'
        ];
    }
}
