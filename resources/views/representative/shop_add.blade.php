@extends('layouts.default')

@section('content')
<div class="admin__management__header">
  <h1 class="admin__management__title">店舗代表者管理画面</h1>
  <form action="{{ route('representative.logout') }}" method="post">
    @csrf
    <button type="submit" name="lgout-btn" class="logout__btn">Logout</button>
  </form>
</div>
<div class="reservation__confirmation__flex">
  <button class="back__btn" onclick="location.href='/representative/management'"><</button>
  <h2 class="shop__add__title">ショップを追加</h2>
</div>
<div class="shop__add">
  <form action="{{ route('shop.create') }}" method="POST" enctype="multipart/form-data" class="shop__add__form">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <table class="shop__add__table">
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        <p class="error">{{$error}}</p>
        @endforeach
      @endif
      <tr class="shop__add__tr">
        <th class="shop__add__th">ショップ名</th>
        <td class="shop__add__td"><input type="text" name="shopname" class="shop__shopname--input"></td>
      </tr>
      <tr class="shop__add__tr">
        <th class="shop__add__th--detail">詳細</th>
        <td class="shop__add__td"><textarea name="detail" class="shop__detail--input">{{ old('detail') }}</textarea></td>
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
.reservation__confirmation__flex {
  display: flex;
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
.shop__add__title {
  font-size: 20px;
  margin-left: 30px;
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
  padding:0 20% 15% 0;
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
  padding-top: 20px;
  margin-left: 20px;
}
@media screen and (max-width: 768px) {
  .admin__management__title {
    font-size: 22px;
    margin-left: 30px;
    margin-top: 40px;
  }
  .shop__add__form {
    width: 80%;
    background-color: #4169E1;
    margin: 0 auto;
  }
  .shop__add__table {
    width: 80%;
  }
  .shop__add__th {
    width: 20%;
  }
  .shop__add__td {
    width: 60%;
  }
  .shop__shopname--input,
  .shop__detail--input {
    width: 80%;
  }
}
@media screen and (max-width: 481px) {
  .shop__add__form {
    width: 80%;
  }
  .shop__add__table {
    width: 80%;
    margin: 30px auto 20px;
  }
  .shop__add__th {
    font-size: 12px;
    padding-right: 20px;
  }
  .shop__add__th--detail {
    font-size: 12px;
  }
  .shop__add__td {
    width: 50%;
  }
  .shop__shopname--input,
  .shop__detail--input {
    width: 80%;
  }
}
</style>