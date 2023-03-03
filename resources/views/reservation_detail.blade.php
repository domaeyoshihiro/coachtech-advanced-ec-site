@extends('layouts.default')

@include('layouts.header2')

@section('content')
<div class="reservation__detail__flex">
  <div class="reservation__detail__container">
    <p class="name">{{ $user->name }}様</p>
    <table class="reservation__detail__table">
      <tr class="reservation__detail__tr">
        <th class="reservation__detail__th">店名</th>
        <td class="reservation__detail__td">{{ $shop->shop_name }}</td>
      </tr>
      <tr class="reservation__detail__tr">
        <th class="reservation__detail__th">予約日</th>
        <td class="reservation__detail__td">{{ date('Y-m-d', strtotime($reservation->reservation_time)) }}</td>
      </tr>
      <tr class="reservation__detail__tr">
        <th class="reservation__detail__th">予約時間</th>
        <td class="reservation__detail__td">{{ date('H:i', strtotime($reservation->reservation_time)) }}</td>
      </tr>
      <tr class="reservation__detail__tr--last">
        <th class="reservation__detail__th">人数</th>
        <td class="reservation__detail__td">{{ $reservation->number }}</td>
      </tr>
    </table>
    <div>
      <p class="reservation__detail__text">来店時に下のQRコードを店員に見せてください。</p>
      <div class="reservation__detail__flex2">
        <p class="reservation__detail__qr">
          {!! QrCode::generate(url()->route('qrcode', ['shop_name' => $shop->shop_name, 'name' => $user->name, 'email' => $user->email, 'number' => $reservation->number,  'reservationdt' => date('Y/m/d H:i', strtotime($reservation->reservation_time)) ])) !!}
        </p>
      </div>
    </div>
    <form action="/mypage/{{ Auth::user()->id }}" method="GET">
      @csrf
      <button class="back__btn">戻る</button>
    </form>
  </div>
</div>
@endsection

<style>
.reservation__detail__flex {
  display: flex;
  justify-content: center;
  margin-top: 30px;
}
.reservation__detail__container {
  background-color: #FFFFFF;
  box-shadow: 2px 2px 1px #C0C0C0;
  border-radius: 5px;
}
.name {
  font-size: 20px;
  padding: 20px 0 20px 20px;
}
.reservation__detail__table {
  width: 80%;
  margin: 0 auto 20px;
}
.reservation__detail__tr {
  border-top: 1px solid #000000;
}
.reservation__detail__tr--last {
  border-top: 1px solid #000000;
  border-bottom: 1px solid #000000;
}
.reservation__detail__th {
  text-align: left;
  padding: 10px 0 10px 15px;
}
.reservation__detail__text {
  margin: 0 20px 20px;
}
.reservation__detail__flex2 {
  display: flex;
  justify-content: center;
}
.back__btn {
  display: block;
  margin: 20px auto;
  font-size: 14px;
  color: 	#FFFFFF;
  background-color: #0000FF;
  border: none;
  border-radius: 5px;
  padding: 3px 10px;
  cursor: pointer;
}
@media screen and (max-width: 768px) {
  .reservation__detail__container {
    width: 80%;
  }
  .reservation__detail__table {
    width: 70%;
  }
}
</style>