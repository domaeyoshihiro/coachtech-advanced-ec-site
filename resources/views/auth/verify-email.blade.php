@extends('layouts.default')

@section('content')
<div class="verify-email__flex">
    <div class="verify-email__container">
        <div class="verify-email__text">
            {{ __('サインアップありがとうございます。ご登録の前に、メールに記載されているリンクをクリックして、メールアドレスの確認をしてください。もしメールが届いていない場合は、認証メール再送信ボタンを押してください。') }}
        </div>
        @if (session('status') == 'verification-link-sent')
            <div class="resend-verify-email__text">
                {{ __('登録時に入力されたメールアドレスに、新しい認証リンクが送信されました。') }}
            </div>
        @endif
        <div class="verify-email__btn">
            <form method="POST" action="{{ route('verification.send') }}" class="resend-verify-email__form">
                @csrf
                <div>
                    <x-button class="resend-verify-email__btn">
                        {{ __('認証メール再送信') }}
                    </x-button>
                </div>
            </form>
            <form method="POST" action="{{ route('logout') }}" class="logout__form">
                @csrf
                <button type="submit" class="logout__btn">
                    {{ __('ログアウト') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
.verify-email__flex {
    display: flex;
    align-items: center;
    height: 100vh;
}
.verify-email__container {
    width: 50%;
    box-shadow: 2px 2px 1px #C0C0C0;
    margin: 0 auto;
    background-color: #FFFFFF;
    border-radius: 5px;
}
.verify-email__text {
    color: #000000;
    margin: 30px;
}
.resend-verify-email__text {
    margin: 0 30px 20px;
}
.verify-email__btn {
    width: 100%;
    margin: 0 auto;
}
.resend-verify-email__form,
.logout__form {
    margin-bottom: 0;
}
.resend-verify-email__btn {
    display: block;
    color: 	#FFFFFF;
    background-color: #0000FF;
    border: none;
    border-radius: 5px;
    margin: 0 auto 10px auto;
    padding:3px 5;
    cursor: pointer;
}
.logout__btn {
    display: block;
    color: 	#FFFFFF;
    background-color: #0000FF;
    border: none;
    border-radius: 5px;
    margin: 0 auto 20px auto;
    padding:3px 5;
    cursor: pointer;
}
@media screen and (max-width: 768px) {
    .verify-email__container {
        width: 80%;
}
}

</style>
