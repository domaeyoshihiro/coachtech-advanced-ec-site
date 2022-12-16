@extends('layouts.default')

@if (Auth::check())
  @include('layouts.header2')
@else
  @include('layouts.header1')
@endif

@section('content')
<div class="shop" id="shop">
  <div class="shop__container">
    <div>
      <button class="back__btn" onclick="location.href='/'"><</button>
      <p class="shop__name">{{ $shops->shopname }}</p>
    </div>
    <div>
      <img src="{{ $shops->image }}" class="shop__img" />
    </div>
    <div class="tag">
      <p class="shop__area--tag">#{{ $shops->area->area }}</p>
      <p class="shop__genre--tag">#{{ $shops->genre->genre }}</p>
    </div>
    <div class="shop__detail">{{ $shops->detail }}</div>
  </div>
  <div class="reservation">
    <h2 class="reservation__title">予約</h2>
    @if (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
        <li class="input__error">{{$error}}</li>
        @endforeach
      </ul>
    @endif
    <form action="{{ route('create') }}" method="POST" class="reservation__form">
      @csrf
      <input type="hidden" name="shop_id" value="{{ $shops->id  }}">
      @if (Auth::check())
        <input type="hidden" name="user_id" value="{{ $user->id  }}">
      @else
          <p class="login__error">ログインしてください。</p>
      @endif
      <div>
        <input type="date" name="date" v-model="date" class="reservation__date--input">
      </div>
      <div>
        <input type="time" name="time" v-model="time" class="reservation__time--input">
      </div>
      <div>
        <input type="text" name="number" value="1人" v-model="number" class="reservation__number--input">
      </div>
      <div>
        <table class="reservation__table">
          <tr class="reservation__tr">
            <th class="reservation__th--first">Shop</th>
            <td class="reservation__td">{{ $shops->shopname }}</td>
          </tr>
          <tr class="reservation__tr">
            <th class="reservation__th">Date</th>
            <td class="reservation__td">@{{ date }}</td>
          </tr>
          <tr class="reservation__tr">
            <th class="reservation__th">Time</th>
            <td class="reservation__td">@{{ time }}</td>
          </tr>
          <tr class="reservation__tr">
            <th class="reservation__th--last">Number</th>
            <td class="reservation__td">@{{ number }}</td>
          </tr>
        </table>
      </div>
      <button type="submit" name="reservation-btn" class="reservation__btn">予約する</button>
    </form>
  </div>
</div>

<script>
const vm = new Vue({
el: '#shop',
  data:{
    date:'',
    time:'',
    number:'1人',
  }
});
</script>
@endsection

<style>
.shop {
  width: 100%;
  display: flex;
}
.shop__container {
  width: 50%;
  margin: 40px 60px;
}
.back__btn {
  font-size: 20px;
  background-color: #FFFFFF;
  border: none;
  border-radius: 5px;
  box-shadow: 2px 2px 1px #C0C0C0;
  padding: 3px 8px;
  margin-right: 5px;
}
.shop__name {
  display: inline-block;
  font-size: 18px;
  font-weight: bold;
}
.shop__img{
  width: 100%;
  margin-top: 20px;
}
.tag {
  display: flex;
}
.shop__area--tag {
  font-size: 14px;
  margin-top: 20px;
  margin-right: 5px;
}
.shop__genre--tag {
  font-size: 14px;
  margin-top: 20px;
}
.shop__detail {
  font-size: 14px;
  margin-top: 20px;
}
.reservation {
  position: relative;
  width: 50%;
  background-color: #4169E1;
  border-radius: 5px;
  box-shadow: 2px 2px 1px #C0C0C0;
  margin-right: 60px;
}
.reservation__title {
  font-size: 24px;
  color: #FFFFFF;
  margin: 30px;
}
.reservation__date--input {
  width: 40%;
  height: 24px;
  border: none;
  border-radius: 5px;
  margin-left: 30px;
  margin-bottom: 10px;
}
.reservation__time--input,
.reservation__number--input {
  width: 85%;
  height: 24px;
  border: none;
  border-radius: 5px;
  margin-left: 30px;
  margin-bottom: 10px;
}
.login__error {
  font-size: 12px;
  color: #FF0000;
  margin-left: 30px;
  margin-bottom: 10px;
}
.reservation__table {
  width: 80%;
  background-color: #6495ED;
  margin: 20px 0 20px 30px;
}
.reservation__th--first {
  width: 30%;
  font-weight: lighter;
  color: #FFFFFF;
  text-align: left;
  padding: 20px 0 10px 30px;
}
.reservation__th{
  width: 30%;
  font-weight: lighter;
  color: #FFFFFF;
  text-align: left;
  padding-left: 30px;
  padding-bottom: 10px;
}
.reservation__th--last {
  width: 30%;
  font-weight: lighter;
  color: #FFFFFF;
  text-align: left;
  padding-left: 30px;
  padding-bottom: 20px;
}
.reservation__td {
  width: 50%;
  color: #FFFFFF;
}
.reservation__btn {
  width: 100%;
  color: #FFFFFF;
  background-color: #0000CD;
  border: none;
  border-radius: 0 0 5px 5px;
  cursor: pointer;
  padding: 10px 0;
  position: absolute;
  bottom: 0px;
}
.input__error {
  list-style: none;
  font-size: 12px;
  color: #FF0000;
  margin-left: 30px;
  margin-bottom: 10px;
}
</style>