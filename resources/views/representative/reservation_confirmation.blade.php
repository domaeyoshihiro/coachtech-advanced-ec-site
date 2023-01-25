@extends('layouts.default')

@section('content')
<div class="admin__management__header">
  <h1 class="admin__management__title">店舗代表者管理画面</h1>
  <form action="{{ route('representative.logout') }}" method="post">
    @csrf
    <button type="submit" name="lgout-btn" class="logout__btn">Logout</button>
  </form>
</div>
<div class="reservation__confirmation__flex1">
  <button class="back__btn" onclick="location.href='/representative/management'"><</button>
  <h2 class="reservation__confirmation__title">予約情報確認</h2>
</div>
<div class="reservation__confirmation__flex2">
  <div class="reservation__confirmation__container">
    <table class="reservation__confirmation__table">
      <tr class="reservation__confirmation__tr1">
        <th class="reservation__confirmation__th">氏名</th>
        <th class="reservation__confirmation__th">予約日</th>
        <th class="reservation__confirmation__th">予約時間</th>
        <th class="reservation__confirmation__th">人数</th>
        <th class="reservation__confirmation__th">コース</th>
      </tr>
      @foreach($reservations as $reservation)
      <tr class="reservation__confirmation__tr2">
        <td class="reservation__confirmation__td">{{ $reservation->user->name }}様</td>
        <td class="reservation__confirmation__td">{{ date('Y-m-d', strtotime($reservation->reservationtime)) }}</td>
        <td class="reservation__confirmation__td">{{ date('H:i', strtotime($reservation->reservationtime)) }}</td>
        <td class="reservation__confirmation__td">{{ $reservation->number }}</td>
        @if(!is_null($reservation->course))
          <td class="reservation__confirmation__td">{{ $reservation->course->coursename }}</td>
        @else
          <td class="reservation__confirmation__td">コース選択なし</td>
        @endif
      </tr>
      @endforeach
    </table>
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
  margin-top: 30px;
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
.reservation__confirmation__flex1 {
  display:flex;
}
.back__btn {
  font-size: 20px;
  background-color: #FFFFFF;
  border: none;
  border-radius: 5px;
  box-shadow: 2px 2px 1px #C0C0C0;
  padding: 3px 8px;
  margin-top: 30px;
  margin-left: 60px;
  margin-bottom: 30px;
  cursor: pointer;
}
.reservation__confirmation__title {
  font-size: 24px;
  margin-left: 30px;
  margin-top: 30px;
  margin-bottom: 30px;
}
.reservation__confirmation__flex2 {
  display:flex;
  justify-content: center;
}
.reservation__confirmation__tr1 {
  border-bottom: 1px solid #000000;
}
.reservation__confirmation__th {
  padding-right: 60px;
}
.reservation__confirmation__td {
  padding-top: 20px;
  padding-right: 60px;
}
@media screen and (max-width: 768px) {
  .admin__management__title {
    font-size: 22px;
    margin-left: 30px;
    margin-top: 40px;
  }
  .back__btn {
    font-size: 20px;
    background-color: #FFFFFF;
    border: none;
    border-radius: 5px;
    box-shadow: 2px 2px 1px #C0C0C0;
    padding: 3px 8px;
    margin-top: 30px;
    margin-left: 30px;
    margin-bottom: 30px;
  }
  .reservation__confirmation__title {
    font-size: 20px;
    margin-left: 30px;
    margin-top: 30px;
    margin-bottom: 30px;
  }
  .reservation__confirmation__container {
    width: 80%;
  }
  .reservation__confirmation__th {
    font-size: 18px;
    padding-right: 10px;
  }
  .reservation__confirmation__td {
    font-size: 14px;
    padding-right: 10px;
  }
}
</style>