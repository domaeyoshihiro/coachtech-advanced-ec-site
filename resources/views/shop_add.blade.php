@extends('layouts.default')

@if (Auth::check())
  @include('layouts.header2')
@else
  @include('layouts.header1')
@endif

@section('content')
<div class="shop__add">
  <h2 class="shop__add__title">ショップを追加</h2>
  <form action="{{ route('shop.create') }}" method="POST" enctype="multipart/form-data" class="shop__add__form">
    @csrf
    <table class="shop__add__table">
      @if ($errors->has('name'))
      @endif
      <tr class="shop__add__tr">
        <th class="shop__add__th">ショップ名</th>
        <td class="shop__add__td"><input type="text" name="shopname" class="shop__shopname--input"></td>
      </tr>
      <tr class="shop__add__tr">
        <th class="shop__add__th--detail">詳細</th>
        <td class="shop__add__td"><textarea cols="45" rows="5" name="detail" class="shop__detail--input">{{ old('detail') }}</textarea></td>
      </tr>
      <tr class="shop__add__tr">
        <th class="shop__add__th">エリア</th>
        <td class="shop__add__td">
          <select name="area_id" class="shop__area--input">
            <option value="1">東京都</option>
            <option value="2">大阪府</option>
            <option value="3">福岡県</option>
          </select>
        </td>
      </tr>
      <tr class="shop__add__tr">
        <th class="shop__add__th">ジャンル</th>
        <td class="shop__add__td">
          <select name="genre_id" class="shop__genre--input">
            <option value="1">寿司</option>
            <option value="2">焼肉</option>
            <option value="3">居酒屋</option>
            <option value="4">イタリアン</option>
            <option value="5">ラーメン</option>
          </select>
        </td>
      </tr>
      <tr class="shop__add__tr">
        <th class="shop__add__th">ショップ画像</th>
        <td class="shop__add__td"><input type="file" name="image" class="shop__image--input"></td>
      </tr>
    </table>
    <button type="submit" class="shop__add__btn">追加する</button>
  </form>
</div>
@endsection

<style>
.shop__add__title {
  font-size: 20px;
  margin-left: 60px;
  margin-top: 30px;
}
.shop__add__form {
  width: 60%;
  background-color: #4169E1;
  margin: 0 auto;
}
.shop__add__table {
  width: 80%;
  margin: 30px auto 20px;
}
.shop__add__th {
  width: 20%;
  text-align: left;
  color: #FFFFFF;
}
.shop__add__th--detail {
  text-align: left;
  vertical-align: top;
  color: #FFFFFF;
}
.shop__add__td {
  width: 80%;
}
.shop__shopname--input,
.shop__detail--input,
.shop__area--input,
.shop__genre--input {
  margin-bottom: 20px;
}
.shop__shopname--input,
.shop__detail--input {
  width: 100%;
}
.shop__shopname--input {
  margin-top: 30px;
}
.shop__detail--input {
  resize: none;
}
.shop__add__btn {
  width: 100%;
  color: #FFFFFF;
  background-color: #0000CD;
  border: none;
  border-radius: 0 0 5px 5px;
  cursor: pointer;
  padding: 10px 0;
}
.error {
  font-size: 12px;
  color: #FF0000;
}
</style>