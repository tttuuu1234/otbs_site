<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'content' => 'required|max10',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '入力必須です',
            'content.max' => '最大10文字です',
            'category_id.required' => '入力必須です',
        ];
    }

}
