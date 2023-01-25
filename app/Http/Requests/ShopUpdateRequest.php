<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'shopname' => ['required','max:191'],
            'detail' => ['required','max:191'],
            'area_id' => ['required'],
            'genre_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'shopname.required' => 'ショップ名を入力してください',
            'shopname.max:191' => 'ショップ名は191文字以下で入力してください',
            'detail.required' => '詳細を入力してください',
            'detail.max:191' => '詳細は191文字以下で入力してください',
            'area_id.required' => 'エリアを入力してください',
            'genre_id.required' => 'ジャンルしてください',
        ];
    }
}
