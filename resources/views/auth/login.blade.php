@extends('layouts.default')

@include('layouts.header1')

@section('content')
<div class="login">
    <div class="login__container">
        <h1 class="login__title">Login</h1>
        <x-auth-session-status :status="session('status')" />
        <form method="POST" action="{{ route('login') }}" class="login__form">
            @csrf
            <p class="error">{{ session('message') }}</p>
            <div class="login__email">
                @if ($errors->has('email'))
                    <p class="error">{{$errors->first('email')}}</p>
                @endif
                <img class="login__email--img" src="{{ asset('img/email.png') }}">
                <x-input id="email" class="login__email--input" type="email" name="email" :value="old('email')" placeholder="Email" />
            </div>
            <div class="login__password">
                @if ($errors->has('password'))
                    <p class="error">{{$errors->first('password')}}</p>
                @endif
                <img class="login__password--img" src="{{ asset('img/password.svg') }}">
                <x-input id="password" type="password" name="password" autocomplete="current-password" placeholder="Password" class="login__password--input" />
            </div>
            <div>
                <x-button class="login__btn">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
.login {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}
.login__container {
    width: 30%;
    box-shadow: 2px 2px 1px #C0C0C0;
    border-radius: 5px 5px 0 0;
}
.login__title {
    font-size: 16px;
    font-weight: lighter;
    color: 	#FFFFFF;
    background-color: #0000FF;
    border-radius: 5px 5px 0 0;
    padding: 15px;
}
.login__form {
    background-color: #FFFFFF;
    border-radius: 0 0 5px 5px;
    padding-bottom: 20px;
}
.login__email {
    padding-top: 15px;
    padding-left: 20px;
}
.login__password {
    padding-left: 20px;
    padding-bottom: 20px;
}
.login__email--input,
.login__password--input {
    font-size: 14px;
    width: 85%;
    border: none;
    outline: none;
    border-bottom: 1px solid #000000;
    margin-bottom: 10px;
}
.login__email--img,
.login__password--img {
    width: 20px;
    height: 20px;
    margin-top: 10px;
}
.login__btn {
    display: block;
    font-size: 14px;
    color: 	#FFFFFF;
    background-color: #0000FF;
    border: none;
    border-radius: 5px;
    padding: 3px 10px;
    margin: 0 20px 0 auto;
    cursor: pointer;
}
.error {
    font-size: 12px;
    color: #FF0000;
}
@media screen and (max-width: 768px) {
    .login__container {
    width: 65%;
    box-shadow: 2px 2px 1px #C0C0C0;
    border-radius: 5px 5px 0 0;
    }
}
</style>
