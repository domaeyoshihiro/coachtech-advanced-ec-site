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
            'subject' => ['required','string','max:30'],
            'title' => ['required','string','max:30'],
            'detail' => ['required','string','max:191'],
        ];
    }
    public function messages()
    {
        return [
            'subject.required' => '件名を入力してください',
            'subject.string' => '件名は文字列入力してください',
            'subject.max' => '件名は30文字以下で入力してください',
            'title.required' => 'お知らせタイトルを入力してください',
            'title.string' => 'お知らせタイトルは文字列入力してください',
            'title.max' => 'お知らせタイトルは30文字以下で入力してください',
            'detail.required' => 'お知らせ内容を入力してください',
            'detail.string' => 'お知らせ内容は文字列入力してください',
            'detail.max' => 'お知らせ内容は191文字以下で入力してください',
        ];
    }
}
