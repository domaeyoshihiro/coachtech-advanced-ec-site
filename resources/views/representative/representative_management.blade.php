@extends('layouts.default')

@section('content')
<div class="admin__management__header">
  <h1 class="admin__management__title">店舗代表者管理画面</h1>
  <form action="{{ route('representative.logout') }}" method="post">
    @csrf
    <button type="submit" name="lgout-btn" class="logout__btn">Logout</button>
  </form>
</div>
<div class="management__container">
  @if(!is_null($shop))
  <div class="shop__container">
    <div>
      <p class="shop__name">{{ $shop->shopname }}</p>
    </div>
    <h2 class="shop__detail__titele">ショップ詳細</h2>
    <div>
      <img src="{{ \Storage::url($shop->image) }}" class="shop__img">
    </div>
    <div class="tag">
      <p class="shop__area--tag">#{{ $shop->area->area }}</p>
      <p class="shop__genre--tag">#{{ $shop->genre->genre }}</p>
    </div>
    <div class="shop__detail">{{ $shop->detail }}</div>
  </div>
  @endif
  
  @if(!is_null($shop))
  <div class="shop__edit__container">
    <h2 class="shop__edit__title">ショップ内容更新</h2>
    <form action="{{ route('shop.update')}}" method="POST" enctype="multipart/form-data" class="shop__edit__form">
      @csrf
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        <p class="error">{{$error}}</p>
        @endforeach
      @endif
      <input type="hidden" name="shop_id" value="{{ $shop->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <table class="shop__edit__table">
        <tr class="shop__edit__tr">
          <th class="shop__edit__th--first">ショップ名</th>
          <td class="shop__edit__td--first">
            <input type="text" name="shopname" value="{{ $shop->shopname }}" class="shop__shopname--input">
          </td>
        </tr>
        <tr class="shop__edit__tr">
          <th class="shop__edit__th">詳細</th>
          <td class="shop__edit__td">
            <textarea name="detail" class="shop__detail--input">{{ $shop->detail }}</textarea></td>
        </tr>
        <tr class="shop__edit__tr">
          <th class="shop__edit__th">エリア</th>
          <td class="shop__edit__td">
            <select name="area_id" class="shop__area--input">
              @foreach($areas as $area)
                @if ($shop->area_id == $area->id)
                  <option value="{{ $area->id }}" selected="selected">{{ $area->area }}</option>
                @else
                  <option value="{{ $area->id }}">{{ $area->area }}</option>
                @endif
              @endforeach
            </select>
          </td>
        </tr>
        <tr class="shop__edit__tr">
          <th class="shop__edit__th">ジャンル</th>
          <td class="shop__edit__td">
            <select name="genre_id" class="shop__genre--input">
              @foreach($genres as $genre)
                @if ($shop->genre_id == $genre->id)
                  <option value="{{ $genre->id }}" selected="selected">{{ $genre->genre }}</option>
                @else
                  <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endif
              @endforeach
            </select>
          </td>
        </tr>
        <tr class="shop__edit__tr">
          <th class="shop__edit__th">ショップ画像変更</th>
          <td class="shop__edit__td"><input type="file" name="image" class="shop__image--input"></td>
        </tr>
      </table>
      <button type="submit" class="update__btn">店舗情報変更</button>
    </form>
    <div class="representative__btn__flex">
      <form action="/shop/course/{{ $shop->id }}" method="GET">
        @csrf
        <button class="course__btn">コース料理を追加する</button>
      </form>
      <form action="/representative/reservation/confirmation/{{ $shop->id }}" method="GET">
        @csrf
        <button class="reservation__confirmation__btn">予約情報を確認する</button>
      </form>
    </div>
  </div>
  @endif
  @if(is_null($shop))
  <div class="reservation__confirmation__flex3">
    <button class="shop__add__btn" onclick="location.href='/shop/add'">ショップを追加する</button>
  </div>
  @endif
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
.management__container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  height: 80vh;
}
.shop__container {
  width: 40%;
  margin: 60px 60px 0;
}
.shop__name {
  display: inline-block;
  font-size: 18px;
  font-weight: bold;
}
.shop__detail__titele {
  font-size: 20px;
  margin-top: 30px;
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
.shop__add__btn {
  font-size: 16px;
  color: 	#FFFFFF;
  background-color: #0000FF;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  margin: 0 0 20px 20px;
  cursor: pointer;
}
.shop__edit__container {
  width: 40%;
}
.shop__edit__title {
  font-size: 20px;
}
.shop__edit__form {
  width: 95%;
  background-color: #4169E1;
  border-radius: 5px;
}
.shop__edit__table {
  width: 100%;
  margin-top: 20px;
}
.shop__edit__th,
.shop__edit__th--first {
  text-align: left;
  vertical-align: top;
  padding-right: 20px;
  padding-bottom: 20px;
  padding-left: 20px;
}
.shop__edit__th--first {
  padding-top: 20px;
}
.shop__edit__td, 
.shop__edit__td--first {
  padding-bottom: 20px;
}
.shop__edit__td--first {
  padding-top: 20px;
}
.shop__detail--input {
  padding:0 20% 15% 0;
  resize: none;
}
.update__btn {
  width: 100%;
  color: #FFFFFF;
  background-color: #0000CD;
  border: none;
  border-radius: 0 0 5px 5px;
  cursor: pointer;
  padding: 10px 0;
}
.representative__btn__flex {
  display: flex;
}
.course__btn,
.reservation__confirmation__btn {
  font-size: 16px;
  color: #FFFFFF;
  background-color: #0000FF;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  margin-top: 20px;
  margin-right: 40px;
  cursor: pointer;
}
.reservation__confirmation__flex3 {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 80vh;
}
.error {
    font-size: 12px;
    color: #FF0000;
    padding-top: 20px;
    margin-left: 20px;
}
@media screen and (max-width: 768px) {
  .admin__management__title {
    font-size: 20px;
    margin-left: 30px;
    margin-top: 40px;
  }
  .shop__container {
    width: 40%;
    margin: 30px auto 0;
  }
  .shop__edit__title {
    margin-left: 30px;
    margin-top: 40px;
  }
  .management__container {
    display: block;
  }
  .shop__container {
    width: 80%;
  }
  .shop__edit__container {
    width: 100%;
  }
  .shop__edit__form {
    width: 80%;
    margin: 0 auto 20px;
  }
  .shop__edit__th,
  .shop__edit__th--first {
    font-size: 16px;
    text-align: left;
    vertical-align: top;
    padding-right: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
  }
  .course__btn,
  .reservation__confirmation__btn {
    font-size: 14px;
    margin-left: 60px;
    margin-right: 40px;
    margin-bottom: 40px;
  }
}
@media screen and (max-width: 481px) {
  .shop__edit__th,
  .shop__edit__th--first {
    font-size: 12px;
    padding-right: 10px;
    padding-bottom: 20px;
    padding-left: 10px;
  }
  .course__btn,
  .reservation__confirmation__btn {
    font-size: 14px;
    margin-left: 40px;
    margin-right: 40px;
    margin-bottom: 40px;
  }
}
</style>
