@extends('layouts.default')

@include('layouts.header2')

@section('content')
@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <p class="error">{{$error}}</p>
  @endforeach
@endif
<div class="mypage">
  <div class="reservation">
    <h2 class="reservation__title">予約状況</h2>
    <p class="error__text">{{ session('message') }}</p>
    @foreach ($reservations as $reservation)
    <div class="reservation__container">
      <div class="reservation__flex--top">
        <div class="reservation__img__title">
          <img src="{{ asset('img/clock.png') }}" class="clock__img" />
          <p class="reservation__text">予約{{ $loop->iteration}}</p>
        </div>
        <div class="reservation__delete">
          <form action="/reservation/delete/{{ $reservation->id }}" method="POST">
            @csrf
            @if (Auth::check())
              <input type="hidden" name="user_id" value="{{ $user->id  }}">
            @endif
            <input type="image" src="{{ asset('img/delete.png') }}" class="delete__img">
          </form>
        </div>
      </div>
      <div>
        <form action="/edit/{{ $reservation->id }}" method="POST">
          @csrf
          <input type="hidden" name="shop_id" value="{{ $reservation->shop->id  }}">
          @if (Auth::check())
            <input type="hidden" name="user_id" value="{{ $user->id  }}">
          @endif
          <table class="reservation__table">
            <tr class="reservation__tr">
              <th class="reservation__th--first">Shop</th>
              <td class="reservation__td">{{ $reservation->shop->shop_name }}</td>
            </tr>
              <tr class="reservation__tr">
                <th class="reservation__th">Date</th>
                <td class="reservation__td">
                  <input type="date" value="{{ date('Y-m-d', strtotime($reservation->reservation_time)) }}" name="date" class="reservation__date--input">
                </td>
              </tr>
              <tr class="reservation__tr">
                <th class="reservation__th">Time</th>
                <td class="reservation__td">
                  <input type="time" value="{{ date('H:i', strtotime($reservation->reservation_time)) }}" name="time"  class="reservation__time--input"></td>
              </tr>
              <tr class="reservation__tr">
                <th class="reservation__th">Number</th>
                <td class="reservation__td">
                  <select name="number" class="reservation__number--input">
                    <option value="1" {{ $reservation->number == '1' ? 'selected' : '' }}>1人</option>
                    <option value="2" {{ $reservation->number == '2' ? 'selected' : '' }}>2人</option>
                    <option value="3" {{ $reservation->number == '3' ? 'selected' : '' }}>3人</option>
                    <option value="4" {{ $reservation->number == '4' ? 'selected' : '' }}>4人</option>
                    <option value="5" {{ $reservation->number == '5' ? 'selected' : '' }}>5人</option>
                  </select>
                </td>
            </tr>
            @if(!is_null($reservation->course))
            <tr class="reservation__tr">
              <th class="reservation__th">Course</th>
              <td class="reservation__td">{{ $reservation->course->course_name }}</td>
            </tr>
            @endif
          </table>
          <button type="submit" name="update-btn" class="update__btn">予約変更</button>
        </form>
        <form action="/reservation/detail/{{ $reservation->id }}" method="GET">
          @csrf
          @if (Auth::check())
            <input type="hidden" name="user_id" value="{{ $user->id  }}">
          @endif
          <input type="hidden" name="shop_id" value="{{ $reservation->shop->id  }}">
          <button class="reservation__detail__btn">予約詳細</button>
        </form>
        <form action="/review/{{ $reservation->shop->id }}" method="GET">
          @csrf
          <input type="hidden" name="reservation_time" value="{{ $reservation->reservation_time }}">
          <button type="submit" class="review__btn">評価をする</button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
  <div class="like">
    <p class="username">{{Auth::user()->name}}さん</p>
    <h2 class="like__title">お気に入り店舗</h2>
    <div class="like__flex">
      @foreach ($likes as $like)
      <div class="shop__container">
        <div>
          @if(config('app.env') === 'production')
            <img src=" {{ $like->shop['image'] }}" class="shop__img">
          @else
            <img src="{{ \Storage::url($like->shop->image) }}" class="shop__img">
          @endif
        </div>
        <div class="shop__content">
          <div class="shop__name">{{ $like->shop->shop_name }}</div>
          <div class="tag">
            <p class="shop__area--tag">#{{ $like->shop->area->area }}</p>
            <p class="shop__genre--tag">#{{ $like->shop->genre->genre }}</p>
          </div>
          <div class="shop__btn__like">
            <form action="/detail/{{ $like->shop->id }}" method="GET" class="shop__form">
              @csrf
              <button class="shop__btn">詳しくみる</button>
            </form>
            <form action="/like/delete/{{ $like->shop->id }}" method="POST" class="">
              @csrf
              @if (Auth::check())
                <input type="hidden" name="user_id" value="{{ $user->id  }}">
              @endif
              <input type="image" src="{{ asset('img/heart2.svg') }}" class="shop__like--img">
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

<style>
.mypage {
  display: flex;
  width: 100%;
}
.reservation {
  width: 40%;
}
.reservation__title {
  font-size: 22px;
  margin: 110px 0 30px 60px;
}
.error__text {
  color: #FF0000;
  margin-left: 60px;
  margin-bottom: 20px;
}
.reservation__container {
  width: 80%;
  background-color: #0000FF;
  border-radius: 5px;
  margin-left: 60px;
  margin-bottom: 20px;
}
.reservation__img__title {
  display: flex;
}
.reservation__flex--top {
  display: flex;
  justify-content: space-between;
  padding-top: 20px;
}
.clock__img {
  margin-left: 30px;
  margin-right: 20px;
}
.delete__img {
  margin-right: 30px;
}
.reservation__text {
  margin-top: 8px;
  color: #FFFFFF;
}
.reservation__table {
  width: 80%;
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
.reservation__td {
  width: 50%;
  color: #FFFFFF;
}
.username {
  font-size: 26px;
  font-weight: bold;
  margin-top: 40px;
  margin-bottom: 40px;
}
.like__title {
  font-size: 22px;
  margin-bottom: 30px;
}
.like {
  width: 60%;
}
.like__flex {
  display: flex;
  flex-wrap: wrap;
}
.shop__container {
  width: 35%;
  box-shadow: 2px 2px 1px #C0C0C0;
  border-radius: 5px;
  margin-right: 60px;
  margin-bottom: 40px;
}
.shop__img {
  width: 100%;
  border-radius: 5px 5px 0 0;
}
.shop__content {
  background-color: #FFFFFF;
  border-radius: 0 0 5px 5px;
}
.shop__name {
  font-size: 18px;
  font-weight: bold;
  padding: 30px 0 10px 20px;
}
.tag {
  display: flex;
  padding: 0 0 20px 20px;
}
.shop__area--tag {
  font-size: 14px;
  margin-right: 5px;
}
.shop__genre--tag {
  font-size: 14px;
}
.shop__btn__like {
  display: flex;
  justify-content: space-between;
}
.shop__btn {
  font-size: 16px;
  color: 	#FFFFFF;
  background-color: #0000FF;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  margin: 0 0 30px 20px;
  cursor: pointer;
}
.shop__like--img {
  width: 30px;
  height: 30px;
  margin-right: 15px;
}
.error {
  font-size: 14px;
  color: #FF0000;
  margin-left: 60px;
  margin-top: 20px;
}
.update__btn {
  width: 100%;
  color: #FFFFFF;
  background-color:	#4169E1;
  border: none;
  cursor: pointer;
  padding: 10px 0;
  margin-top: 20px;
}
.reservation__detail__btn {
  width: 100%;
  color: #FFFFFF;
  background-color:	#00008B;
  border: none;
  cursor: pointer;
  padding: 10px 0;
}
.review__btn {
  width: 100%;
  color: #000000;
  background-color:	#C0C0C0;
  border: none;
  border-radius: 0 0 5px 5px;
  cursor: pointer;
  padding: 10px 0;
}
@media screen and (max-width: 768px) {
  .mypage {
    display: block;
    width: 100%;
  }
  .reservation {
    width: 80%;
    margin: 0 auto;
  }
  .reservation__title {
    font-size: 22px;
    margin: 30px 0 30px 20px;
  }
  .reservation__container {
    width: 100%;
    margin:0 auto 30px ;
  }
  .like {
    width: 80%;
    margin: 0 auto;
  }
  .like__flex {
    display: block;
  }
  .shop__container {
    width: 100%;
  }
}
</style>