@extends('layouts.default')

@include('layouts.header1')

@section('content')
    <div class="register">
        <div class="register__container">
            <h1 class="register__title">Registration</h1>
            <form method="POST" action="{{ route('register') }}" class="register__form">
                @csrf
                <div class="register__name">
                    @if ($errors->has('name'))
                        <p class="error">{{$errors->first('name')}}</p>
                    @endif
                    <img class="register__name--img" src="{{ asset('img/user.png') }}">
                    <x-input id="name" class="register__name--input" type="text" name="name" :value="old('name')" placeholder="Username" />
                </div>
                <div class="register__email">
                    @if ($errors->has('email'))
                        <p class="error">{{$errors->first('email')}}</p>
                    @endif
                    <img class="register__email--img" src="{{ asset('img/email.png') }}">
                    <x-input id="email" class="register__email--input" type="email" name="email" :value="old('email')" placeholder="Email" />
                </div>
                <div class="register__password">
                    @if ($errors->has('password'))
                        <p class="error">{{$errors->first('password')}}</p>
                    @endif
                    <img class="register__password--img" src="{{ asset('img/password.svg') }}">
                    <x-input id="password" class="register__password--input" type="password" name="password" autocomplete="new-password" placeholder="Password" />
                </div>
                <div>
                    <x-button class="register__btn">
                        {{ __('登録') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection

<style>
.register {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
}
.register__container {
    width: 30%;
    box-shadow: 2px 2px 1px #C0C0C0;
    border-radius: 5px 5px 0 0;
}
.register__title {
    font-size: 16px;
    font-weight: lighter;
    color: 	#FFFFFF;
    background-color: #0000FF;
    border-radius: 5px 5px 0 0;
    padding: 15px;
}
.register__form {
    background-color: #FFFFFF;
    border-radius: 0 0 5px 5px;
    padding-bottom: 20px;
}
.register__name {
    padding-top: 15px;
    padding-left: 20px;
}
.register__email {
    padding-left: 20px;
}
.register__password {
    padding-left: 20px;
    padding-bottom: 20px;
}
.register__name--input,
.register__email--input,
.register__password--input {
    font-size: 14px;
    width: 85%;
    border: none;
    outline: none;
    border-bottom: 1px solid #000000;
    margin-bottom: 10px;
}
.register__name--img,
.register__email--img,
.register__password--img {
    width: 20px;
    height: 20px;
    margin-top: 10px;
}
.register__btn {
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
</style>
