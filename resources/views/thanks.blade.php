@extends('layouts.default')

@include('layouts.header1')

@section('content')
<div class="thanks">
  <div class="thanks__container">
    <p class="thanks__text">会員登録ありがとうございます</p>
    <button class="thanks__btn" onclick="location.href='/login'">ログインする</button>
  </div>
</div>
@endsection

<style>
.thanks {
  display: flex;
  width: 100vw;
  height: 50vh;
  justify-content:center;
  align-items: center;
  text-align: center;
}
.thanks__container {
  width: 30%;
  background-color: #FFFFFF;
  box-shadow: 2px 2px 1px #C0C0C0;
  border-radius: 5px 5px 0 0;
}
.thanks__text {
  font-size: 20px;
  padding: 80px 30px 30px;
}
.thanks__btn {
  font-size: 14px;
  color: 	#FFFFFF;
  background-color: #0000FF;
  border: none;
  border-radius: 5px;
  padding: 3px 10px;
  margin-bottom: 80px;
  cursor: pointer;
}
@media screen and (max-width: 768px) {
  .thanks__container {
    width: 60%;
    background-color: #FFFFFF;
    box-shadow: 2px 2px 1px #C0C0C0;
    border-radius: 5px 5px 0 0;
  }
}
</style>