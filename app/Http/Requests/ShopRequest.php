<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'shop_name' => ['required','string','max:191'],
            'image' => ['required','max:1024','mimes:jpg,jpeg,png'],
            'detail' => ['required','string','max:191'],
            'area_id' => ['required'],
            'genre_id' => ['required'],
            'user_id' => ['unique:shops'],
        ];
    }
    public function messages()
    {
        return [
            'shop_name.required' => 'ショップ名を入力してください',
            'shop_name.string' => 'ショップ名は文字列で入力してください',
            'shop_name.max' => 'ショップ名は191文字以下で入力してください',
            'image.required' => '画像を追加してください',
            'image.max' => '画像容量が大きいです',
            'image.mimes' => '画像はjpg、jpeg、png形式で追加してください',
            'detail.required' => '詳細を入力してください',
            'detail.string' => '詳細は文字列で入力してください',
            'detail.max' => '詳細は191文字以下で入力してください',
            'area_id.required' => 'エリアを入力してください',
            'genre_id.required' => 'ジャンルしてください',
            'user_id.unique' => 'このユーザーは既にショップを持っています',
        ];
    }
}
