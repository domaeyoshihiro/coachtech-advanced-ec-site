<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'user_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'ログインしてください',
        ];
    }
}
