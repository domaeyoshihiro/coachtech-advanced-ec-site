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
      <p class="shop__name">{{ $shops->shop_name }}</p>
    </div>
    <div>
      @if(config('app.env') === 'production')
        <img src="{{ $shops['image'] }}" class="shop__img">
      @else
        <img src="{{ \Storage::url($shops->image) }}" class="shop__img">
      @endif
    </div>
    <div class="tag">
      <p class="shop__area--tag">#{{ $shops->area->area }}</p>
      <p class="shop__genre--tag">#{{ $shops->genre->genre }}</p>
    </div>
    <div class="shop__detail">{{ $shops->detail }}</div>
  </div>
  <div class="review">
    <h2 class="review__title">評価</h2>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <p class="error">{{$error}}</>
      @endforeach
    @endif
    <table class="review__table">
      @foreach ($reviews as $review)
      <tr class="review__tr--name">
        <th class="review__th">ユーザーネーム</th>
        <td class="review__td">{{ $review->user->name}}</td>
      </tr>
      <tr class="review__tr--star">
        <th class="review__th">評価(5段階)</th>
        <td class="review__td">
          @if ($review->star == 1)
            <img src="{{ asset('img/star1.svg') }}" class="star__img">
          @endif
          @if ($review->star == 2)
            <img src="{{ asset('img/star2.svg') }}" class="star__img">
          @endif
          @if ($review->star == 3)
            <img src="{{ asset('img/star3.svg') }}" class="star__img">
          @endif
          @if ($review->star == 4)
            <img src="{{ asset('img/star4.svg') }}" class="star__img">
          @endif
          @if ($review->star == 5)
            <img src="{{ asset('img/star5.svg') }}" class="star__img">
          @endif
        </td>
      </tr>
      <tr class="review__tr--comment">
        <th class="review__th">コメント</th>
        <td class="review__td">{{ $review->comment }}</td>
      </tr>
      @endforeach
    </table>
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
  width: 50%;
  background-color: #FFFFFF;
  box-shadow: 2px 2px 1px #C0C0C0;
  margin-right: 60px;
}
.review__title {
  font-size: 24px;
  color: #000000;
  margin: 30px;
}
.review__table {
  width: 90%;
  border-top: 1px solid black;  
  margin-left: 20px;
  margin-bottom: 20px;
}
.review__tr--comment {
  border-bottom: 1px solid black;  
}
.review__th {
  width: 35%;
  font-size: 14px;
  text-align: left;
  padding-bottom: 5px;
}
.review__td {
  width: 65%;
}
.star__img {
  width: 80px;
  height: 16px;
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
  .review {
    width: 80%;
    margin:0 auto;
    padding-bottom: 20px;
  }
  .review__title {
    padding-top: 30px;
  }
}
</style>