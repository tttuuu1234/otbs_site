<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
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
            'content' => 'required|max:400',
            'category_id' => 'required',
            'subCategory_id' => 'required',
            'name' => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '入力必須だよーーーーーーーーん',
            'content.max'      => '400文字以内で入力しろよな？',
            'category_id.required' => '入力必須だわい',
            'subCategory_id.required' => '入力必須でええええす',
            'name.required' => '入力必須だぜい',
            'name.max' => '50文字以内なんだわ',
        ];
    }
}

