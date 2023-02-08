@extends('layouts.default')

@section('content')
<div class="qr__flex">
  <div class="qr__container">
    <h1 class="qr__title">お客様情報照合</h1>
    <p class="qr__shopname">{{ $shopname }}</p>
    <h2 class="qr__container__title">予約情報</h2>
    <table class="qr__table">
      <tr class="qr__tr">
        <th class="qr__th">予約日時</th>
        <td class="qr__td">{{ $reservationdt }}</td>
      </tr>
      <tr class="qr__tr--last">
        <th class="qr__th">人数</th>
        <td class="qr__td">{{ $number }}</td>
      </tr>
    </table>
    <h2 class="qr__container__title">お客様情報</h2>
    <table class="qr__table">
      <tr class="qr__tr">
        <th class="qr__th">氏名</th>
        <td class="qr__td">{{ $name }}</td>
      </tr>
      <tr class="qr__tr--last">
        <th class="qr__th">メールアドレス</th>
        <td class="qr__td">{{ $email }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection

<style>
.qr__flex {
  display: flex;
  justify-content: center;
  margin-top: 50px;
}
.qr__container {
  width: 60%;
  background-color: #FFFFFF;
  box-shadow: 2px 2px 1px #C0C0C0;
  border-radius: 5px;
}
.qr__title {
  font-size: 24px;
  padding: 20px 0 20px 20px;
}
.qr__shopname {
  font-size: 22px;
  padding: 20px 0 20px 20px;
}
.qr__container__title {
  font-size: 20px;
  padding: 20px 0 20px 20px;
}
.qr__table {
  width: 80%;
  margin: 0 auto 30px;
}
.qr__tr {
  border-top: 1px solid #000000;
}
.qr__tr--last {
  border-top: 1px solid #000000;
  border-bottom: 1px solid #000000;
}
.qr__th {
  text-align: left;
  padding: 10px 0 10px 15px;
}
.qr__td {
  text-align: left;
  padding: 10px 0 10px 15px;
}
@media screen and (max-width: 768px) {
  .qr__container {
    width: 80%;
  }
  .qr__title {
    font-size: 20px;
  }
  .qr__shopname {
    font-size: 18px;
  }
  .qr__container__title {
    font-size: 16px;
  }
  .qr__th {
    width: 40%;
    font-size: 10px;
  }
  .qr__td {
    width: 60%;
    font-size: 10px;
  }
}
</style>