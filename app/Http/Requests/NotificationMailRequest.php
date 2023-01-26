<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationMailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'subject' => ['required','max:30'],
            'title' => ['required','max:30'],
            'detail' => ['required','max:191'],
        ];
    }
    public function messages()
    {
        return [
            'subject.required' => '件名を入力してください',
            'subject.max:30' => '件名は30文字以下で入力してください',
            'title.required' => 'お知らせタイトルを入力してください',
            'title.max:30' => 'お知らせタイトルは30文字以下で入力してください',
            'detail.required' => 'お知らせ内容を入力してください',
            'detail.max:191' => 'お知らせ内容は191文字以下で入力してください',
        ];
    }
}
