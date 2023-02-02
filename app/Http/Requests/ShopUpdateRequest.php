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
            'shopname' => ['required','string','max:191'],
            'detail' => ['required','string','max:191'],
            'image' => ['max:1024','mimes:jpg,jpeg,png'],
            'area_id' => ['required'],
            'genre_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'shopname.required' => 'ショップ名を入力してください',
            'shopname.string' => 'ショップ名は文字列で入力してください',
            'shopname.max:191' => 'ショップ名は191文字以下で入力してください',
            'image.max:1024' => '画像容量が大きいです',
            'image.mimes' => '画像はjpg、jpeg、png形式で追加してください',
            'detail.required' => '詳細を入力してください',
            'detail.string' => '詳細は文字列で入力してください',
            'detail.max:191' => '詳細は191文字以下で入力してください',
            'area_id.required' => 'エリアを入力してください',
            'genre_id.required' => 'ジャンルしてください',
        ];
    }
}
