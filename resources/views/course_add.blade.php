@extends('layouts.default')

@include('layouts.header2')

@section('content')
<div class="shop" id="shop">
  <div class="shop__container">
    <div>
      <button class="back__btn" onclick="location.href='/'"><</button>
      <p class="shop__name">{{ $shops->shopname }}</p>
    </div>
    <div>
      <img src="{{ \Storage::url($shops->image) }}" class="shop__img">
    </div>
    <div class="tag">
      <p class="shop__area--tag">#{{ $shops->area->area }}</p>
      <p class="shop__genre--tag">#{{ $shops->genre->genre }}</p>
    </div>
    <div class="shop__detail">{{ $shops->detail }}</div>
  </div>
  <div class="course">
    <h2 class="course__title">コースを追加</h2>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="error">{{$error}}</>
      @endforeach
    @endif
    <form action="{{ route('course.create') }}" method="POST" class="course__form">
      @csrf
      <input type="hidden" name="shop_id" value="{{ $shops->id  }}">
      <div class="course__coursename">
        <label for="coursename" class="course__coursename--label">コース名 :</label>
        <input type="text" name="coursename" id="coursename" class="course__coursename--input">
      </div>
      <div class="course__price">
        <label for="price" class="course__price--label">金額 :</label>
        <input type="number" name="price" class="course__price--input"><p class="course__jpy__text">円</p>
      </div>
      <button type="submit" class="course__add__btn">コースを追加する</button>
    </form>
  </div>
</div>

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
  cursor: pointer;
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
.course {
  width: 50%;
  height: 100%;
  background-color: #4169E1;
  border-radius: 5px;
  box-shadow: 2px 2px 1px #C0C0C0;
  margin-top: 85px;
  margin-right: 60px;
}
.course__title {
  font-size: 24px;
  color: #FFFFFF;
  margin: 30px;
}
.course__coursename,
.course__price {
  margin-bottom: 20px;
}
.course__coursename--label {
  color: #FFFFFF;
  margin-left: 30px;
}
.course__price--label {
  color: #FFFFFF;
  margin-left: 60px;
}
.course__coursename--input {
  width: 40%;
  height: 24px;
  border: none;
  border-radius: 5px;
  margin-left: 10px;
}
.course__price--input {
  width: 40%;
  height: 24px;
  border: none;
  border-radius: 5px;
  margin-left: 10px;
}
.course__jpy__text {
  display: inline-block;
  color: #FFFFFF;
  margin-left: 10px;
}

.course__add__btn {
  width: 100%;
  color: #FFFFFF;
  background-color: #0000CD;
  border: none;
  border-radius: 0 0 5px 5px;
  cursor: pointer;
  padding: 10px 0;
}
.error {
  list-style: none;
  font-size: 12px;
  color: #FF0000;
  margin-left: 30px;
  margin-bottom: 10px;
}
@media screen and (max-width: 768px) {
  .shop {
    width: 100%;
    display: block;
  }
  .shop__container {
    width: 80%;
    margin: 40px auto;
  }
  .course {
    width: 80%;
    height: auto;
    margin:0 auto;
  }
  .course__title {
    padding-top: 30px;
  }
}
</style>