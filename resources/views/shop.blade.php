@extends('layouts.default')

@if (Auth::check())
  @include('layouts.header4')
@else
  @include('layouts.header3')
@endif

@section('content')
@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <p class="error">{{$error}}</p>
  @endforeach
@endif
<div class="shop">
  @foreach ($shops as $shop)
  <div class="shop__container">
    <div>
      @if(config('app.env') === 'production')
        <img src="{{ $shop['image'] }}" class="shop__img">
      @else
        <img src="{{ \Storage::url($shop->image) }}" class="shop__img">
      @endif
    </div>
    <div class="shop__content">
      <div class="shop__name">{{ $shop->shopname }}</div>
      <div class="tag">
        <p class="shop__area--tag">#{{ $shop->area->area }}</p>
        <p class="shop__genre--tag">#{{ $shop->genre->genre }}</p>
      </div>
      <div class="shop__btn__like">
        <form action="/detail/{{ $shop->id }}" method="GET" class="shop__form">
          @csrf
          <button class="shop__btn">詳しくみる</button>
        </form>
        @if ($shop->is_liked_by_auth_user())
        <form action="/like/delete/{{ $shop->id }}" method="POST">
          @csrf
          @if (Auth::check())
            <input type="hidden" name="user_id" value="{{ $user->id  }}">
          @endif
          <input type="image" src="{{ asset('img/heart2.svg') }}" class="shop__like--img">
        </form>
        @else
        <form action="/like/add/{{ $shop->id }}" method="POST">
          @csrf
          @if (Auth::check())
            <input type="hidden" name="user_id" value="{{ $user->id  }}">
          @endif
          <input type="image" src="{{ asset('img/heart.svg') }}" class="shop__like--img">
        </form>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection

<style>
.shop {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  margin: 30px 20px 30px 30px;
}
.shop__container {
  width: 23%;
  box-shadow: 2px 2px 1px #C0C0C0;
  border-radius: 5px;
  margin-right: 10px;
  margin-bottom: 20px;
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
  margin: 0 0 20px 20px;
  cursor: pointer;
}
.shop__like--img {
  width: 30px;
  height: 30px;
  margin-right: 15px;
}
.error {
  font-size: 12px;
  color: #FF0000;
  margin-left: 60px;
}
@media screen and (max-width: 768px) {
  .shop {
    display: block;
  }
  .shop__container {
    width: 80%;
    margin: 0 auto 30px;
  }
}
</style>