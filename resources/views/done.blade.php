@extends('layouts.default')

@include('layouts.header2')

@section('content')
<div class="done">
    <div class="done__container">
      <p class="done__text">ご予約ありがとうございます</p>
      <button class="done__btn" onclick="location.href='/'">戻る</button>
    </div>
  </div>
@endsection

<style>
.done {
  display: flex;
  width: 100vw;
  height: 50vh;
  justify-content:center;
  align-items: center;
  text-align: center;
}
.done__container {
  width: 30%;
  background-color: #FFFFFF;
  box-shadow: 2px 2px 1px #C0C0C0;
  border-radius: 5px 5px 0 0;
}
.done__text {
  font-size: 20px;
  padding: 80px 30px 30px;
}
.done__btn {
  font-size: 14px;
  color: 	#FFFFFF;
  background-color: #0000FF;
  border: none;
  border-radius: 5px;
  padding: 3px 10px;
  margin-bottom: 80px;
  cursor: pointer;
}
</style>