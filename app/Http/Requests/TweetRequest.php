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
            'contents' => 'required|max:400',
        ];
    }

    public function message()
    {
        return [
            'contents.required' => '入力必須だよーーーーーーーーん',
            'contents.max'      => '400文字以内で入力しろよな？',
        ];
    }
}

