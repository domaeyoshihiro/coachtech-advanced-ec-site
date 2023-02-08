<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'comment' => ['required','string','max:191'],
            'star' => ['required'],
            'user_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'comment.required' => 'コメントを入力してください',
            'comment.string' => 'コメントは文字列で入力してください',
            'comment.max:191' => 'コメントは191文字以下で入力してください',
            'star.required' => '評価を入力してください',
            'user_id.required' => 'ログインしてください',
        ];
    }
}
