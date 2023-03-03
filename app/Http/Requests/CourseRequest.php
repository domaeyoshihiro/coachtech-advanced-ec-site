<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'course_name' => ['required','string', 'min:4', 'max:191'],
            'price' => ['required','regex:/^[1-9][0-9]+/'],
            'shop_id' => ['required'],

        ];
    }
    public function messages()
    {
        return [
            'course_name.required' => 'コース名を入力してください',
            'course_name.string' => 'コース名は文字列で入力してください',
            'course_name.min' => 'コース名は4文字以上で入力してください',
            'course_name.max' => 'コース名は191文字以下で入力してください',
            'price.required' => '金額を入力してください',
            'price.regex:/^[1-9][0-9]+/' => '金額は正の整数で入力してください',
            'shop_id.required' => 'ショップを選択してください',
        ];
    }
}
