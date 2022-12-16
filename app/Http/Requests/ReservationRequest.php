<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'date' => ['required','date'],
            'time' => ['required','date_format:H:i'],
            'number' => ['required', 'string'],
        ];
    }
    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date' => '日付型で入力してください',
            'time.required' => '時間を入力してください',
            'time.date' => '時間型で入力してください',
            'number.required' => '人数を入力してください',
            'number.string' => '文字列で入力してください',
        ];
    }
}
