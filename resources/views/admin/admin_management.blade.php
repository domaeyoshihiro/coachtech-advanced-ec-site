@extends('layouts.default')

@section('content')
<div class="admin__management__header">
  <h1 class="admin__management__title">管理者画面</h1>
  <form action="{{ route('admin.logout') }}" method="post">
    @csrf
    <button type="submit" name="lgout-btn" class="logout__btn">Logout</button>
  </form>
</div>
<div class="management__container">
  <div class="register">
    <h2 class="register__title">Representative Registration</h2>
    <form method="POST" action="{{ route('admin.create') }}" class="register__form">
      @csrf
      <input type="hidden" name="role" value="2">
      <div class="register__name">
        @if ($errors->has('name'))
          <p class="error">{{$errors->first('name')}}</p>
        @endif
        <img class="register__name--img" src="{{ asset('img/user.png') }}">
        <input id="name" class="register__name--input" type="text" name="name" :value="old('name')" placeholder="Username" />
      </div>
      <div class="register__email">
        @if ($errors->has('email'))
          <p class="error">{{$errors->first('email')}}</p>
        @endif
        <img class="register__email--img" src="{{ asset('img/email.png') }}">
        <input id="email" class="register__email--input" type="email" name="email" :value="old('email')" placeholder="Email" />
      </div>
      <div class="register__password">
        @if ($errors->has('password'))
          <p class="error">{{$errors->first('password')}}</p>
        @endif
        <img class="register__password--img" src="{{ asset('img/password.svg') }}">
        <input id="password" class="register__password--input" type="password" name="password" autocomplete="new-password" placeholder="Password" />
      </div>
      <div>
        <button class="register__btn">
          店舗代表者追加
        </button>
      </div>
    </form>
  </div>
  <div class="mail">
    <h2 class="mail__title">Mail</h2>
    <p class="mail__complete__message">{{ session('message') }}</p>
    <form action="{{ route('admin.mail') }}" method="POST" class="mail__form">
    @csrf
    <table class="mail__table">
      <tr>
        @if ($errors->has('subject'))
          <td class="error__td">{{$errors->first('subject')}}</td>
        @endif
      </tr>
      <tr class="mail__tr">
        <th class="mail__th">件名</th>
        <td class="mail__td"><input type="text" name="subject" class="mail__subject--input"></td>
      </tr>
      <tr>
        @if ($errors->has('title'))
          <td class="error__td">{{$errors->first('title')}}</td>
        @endif
      </tr>
      <tr class="mail__tr">
        <th class="mail__th">お知らせタイトル</th>
        <td class="mail__td"><input type="text" name="title" class="mail__title--input"></td>
      </tr>
      <tr>
        @if ($errors->has('detail'))
          <td class="error__td">{{$errors->first('detail')}}</td>
        @endif
      </tr>
      <tr class="mail__tr">
        <th class="mail__th">お知らせ内容</th>
        <td class="mail__td"><textarea name="detail" class="mail__detail--input">{{ old('detail') }}</textarea></td>
      </tr>
    </table>
    <button type="submit" class="mail__btn">お知らせを送信する</button>
  </form>
  </div>
</div>
@endsection

<style>
.admin__management__header {
  display: flex;
  justify-content: space-between;
}
.admin__management__title {
  font-size: 24px;
  margin-left: 60px;
  margin-top: 40px;
}
.logout__btn {
  font-size: 18px;
  color: 	#FFFFFF;
  background-color: #0000FF;
  border: none;
  border-radius: 5px;
  padding: 3px 10px;
  margin-top: 40px;
  margin-right: 60px;
  cursor: pointer;
}
.management__container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  height: 80vh;
}
.register {
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
.mail {
  width: 40%;
}
.mail__title {
  font-size: 20px;
  margin-left: 30px;
  margin-top: 30px;
}
.mail__complete__message {
  margin-left: 30px;
  margin-top: 20px;
}
.mail__form {
  width: 100%;
  background-color: #4169E1;
  margin: 0 auto;
  box-shadow: 2px 2px 1px #C0C0C0;
  border-radius: 5px;
}
.mail__table {
  width: 90%;
  margin: 30px auto 20px;
}
.mail__th {
  width: 40%;
  text-align: left;
  vertical-align: top;
  color: #FFFFFF;
  padding-top: 20px;
}
.mail__td {
  width: 60%;
}
.mail__subject--input,
.mail__title--input {
  width: 100%;
  margin-top: 20px;
}
.mail__detail--input {
  width: 100%;
  padding-bottom: 50px;
  margin-top: 20px;
  resize: none;
}
.mail__btn {
  width: 100%;
  color: #FFFFFF;
  background-color: #0000CD;
  border: none;
  border-radius: 0 0 5px 5px;
  cursor: pointer;
  padding: 10px 0;
}
.error,
.error__td {
  font-size: 12px;
  color: #FF0000;
  padding-top: 20px;
  margin-left: 20px;
}
@media screen and (max-width: 768px) {
  .management__container {
    display: block;
  }
  .register {
    width: 80%;
    margin: 30px auto 0;
  }
  .mail {
    width: 80%;
    margin: 0 auto;
  }
}
</style>
