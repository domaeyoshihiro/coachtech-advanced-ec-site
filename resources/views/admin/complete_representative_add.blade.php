@extends('layouts.default')

@section('content')
<div class="complete">
  <div class="complete__container">
    <p class="complete__text">店舗代表者を追加しました。</p>
    <button class="complete__btn" onclick="location.href='/admin/management'">管理画面に戻る</button>
  </div>
</div>
@endsection

<style>
.complete {
  display: flex;
  width: 100vw;
  height: 100vh;
  justify-content:center;
  align-items: center;
  text-align: center;
}
.complete__container {
  width: 30%;
  background-color: #FFFFFF;
  box-shadow: 2px 2px 1px #C0C0C0;
  border-radius: 5px 5px 0 0;
}
.complete__text {
  font-size: 20px;
  padding: 80px 30px 30px;
}
.complete__btn {
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
  .complete__container {
    width: 60%;
    background-color: #FFFFFF;
    box-shadow: 2px 2px 1px #C0C0C0;
    border-radius: 5px 5px 0 0;
  }
}
</style>