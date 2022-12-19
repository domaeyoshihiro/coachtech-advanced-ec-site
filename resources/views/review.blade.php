@extends('layouts.default')

@if (Auth::check())
  @include('layouts.header2')
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
  <div class="review">
    <h2 class="review__title">評価をする</h2>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="error">{{$error}}</>
      @endforeach
    @endif
    <form action="{{ route('review.create') }}" method="POST" class="review__form">
      @csrf
      <input type="hidden" name="shop_id" value="{{ $shops->id  }}">
      @if (Auth::check())
        <input type="hidden" name="user_id" value="{{ $user->id  }}">
      @endif
      <p class="star__text">評価（5段階）</p>
      <div class="star__form">
        <input id="star5" type="radio" name="star" value="5">
        <label for="star5" class="star__label">★</label>
        <input id="star4" type="radio" name="star" value="4">
        <label for="star4" class="star__label">★</label>
        <input id="star3" type="radio" name="star" value="3">
        <label for="star3" class="star__label">★</label>
        <input id="star2" type="radio" name="star" value="2">
        <label for="star2" class="star__label">★</label>
        <input id="star1" type="radio" name="star" value="1">
        <label for="star1" class="star__label">★</label>
      </div>
      <p class="comment__text">コメント</p>
      <div>
        <textarea cols="45" rows="5" type="comment" name="comment" class="review__comment">{{ old('opinion') }}</textarea>
      </div>
      <button type="submit" name="review-btn" class="review__btn">評価をする</button>
    </form>
  </div>
</div>
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
.shop__detail {
  font-size: 14px;
  margin-top: 20px;
}
.review {
  position: relative;
  width: 50%;
  background-color: #4169E1;
  border-radius: 5px;
  box-shadow: 2px 2px 1px #C0C0C0;
  margin-right: 60px;
}
.review__title {
  font-size: 24px;
  color: #FFFFFF;
  margin: 30px;
}
.star__text {
  font-size: 18px;
  color: #FFFFFF;
  margin-left: 30px;
  margin-bottom: 10px;
}
.star__form {
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-end;
  margin-left: 20px;
}
.star__form input[type=radio] {
  display: none;
}
.star__form .star__label {
  position: relative;
  padding: 0 5px;
  color: #ccc;
  cursor: pointer;
  font-size: 35px;
}
.star__form .star__label:hover {
  color: #ffcc00;
}
.star__form.star__label:hover ~ .star__label {
  color: #ffcc00;
}
.star__form input[type=radio]:checked ~ .star__label {
  color: #ffcc00;
}
.comment__text {
  font-size: 18px;
  color: #FFFFFF;
  margin: 30px 0 10px 30px;
}
.review__comment {
  width: 80%;
  border-radius: 3px;
  resize: none;
  margin-left: 30px;
}
.review__btn {
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
.error {
  list-style: none;
  font-size: 12px;
  color: #FF0000;
  margin-left: 30px;
  margin-bottom: 10px;
}
</style>