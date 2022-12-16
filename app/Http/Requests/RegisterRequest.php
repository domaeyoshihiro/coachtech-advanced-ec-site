<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => ['required','max:191'],
            'email' => ['required', 'string', 'email', 'min:8', 'max:191', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:191'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.max' => '191文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => '文字列で入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.min' => 'メールアドレスは8文字以上で入力してください',
            'email.max' => '191文字以下で入力してください',
            'email.unique' => 'このメールアドレスはすでに登録されています',
            'password.required' => 'パスワードを入力してください',
            'password.string' => '文字列で入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは191文字以下で入力してください',
        ];
    }
}
