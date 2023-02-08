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
            'user_id' => ['required'],
            'date' => ['required','date','after:today'],
            'time' => ['required','date_format:H:i'],
            'number' => ['required', 'regex:/^[1-9][0-9]*人$/'],
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'ログインしてください',
            'date.required' => '日付を入力してください',
            'date.date' => '日付型で入力してください',
            'date.after' => '日付は明日以降を入力してください',
            'time.required' => '時間を入力してください',
            'time.date' => '時間型で入力してください',
            'number.required' => '人数を入力してください',
        ];
    }
}
