@extends('layouts.default')

@include('layouts.header2')

@section('content')
<div>
  <h1 class="settlement__title">決済・予約画面</h1>
  <form action="{{ route('reservation.create') }}" method="POST">
    @csrf
    <div>
      <table class="confirm__table">
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>Name</label>
          </th>
          <td class="confirm__td">
            {{ $user->name }}様
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>Shop</label>
          </th>
          <td class="confirm__td">
            {{ $shop->shop_name }}
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>Date</label>
          </th>
          <td class="confirm__td">
            {{ $inputs['date'] }}
            <input name="date" value="{{ $inputs['date'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>Time</label>
          </th>
          <td class="confirm__td">
            {{ $inputs['time'] }}
            <input name="time" value="{{ $inputs['time'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>Number</label>
          </th>
          <td class="confirm__td">
            {{ $inputs['number'] }}人
            <input name="number" value="{{ $inputs['number'] }}" type="hidden">
          </td>
        </tr>
        <tr class="confirm__tr">
          <th class="confirm__th">
            <label>コース</label>
          </th>
          @if(isset($course))
          <td class="confirm__td">
            {{ $course->course_name }} {{ $course->price }}円
            <input name="price" value="{{ $course->price }}" type="hidden">
          </td>
          @else
          <td class="confirm__td">
            <p>コース選択なし</p>
          </td>
          @endif
        </tr>
      </table>
      <input name="shop_id" value="{{ $shop_id }}" type="hidden">
      <input name="user_id" value="{{ $user_id }}" type="hidden">
      <input name="course_id" value="{{ $course_id }}" type="hidden">
    </div>
    @if(isset($course))
    <div class=”settlement__btn”>
      <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-amount="{{ $course->price }}"
        data-name="決済と予約確定"
        data-label="決済と予約確定をする"
        data-description="コースの前払い料金です"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto"
        data-currency="JPY">
      </script>
    </div>
    @else
    <div>
      <button type="submit" class="reservation__btn">予約を確定する</button>
    </div>
    @endif
  </form>
</div>
@endsection

<style>
.settlement__title {
  font-size: 24px;
  text-align: center;
  margin: 30px 0;
}
.confirm__table {
  margin: 0 auto;
}
.confirm__th {
  width:;
  text-align: left;
  padding-right: 20px;
  padding-bottom: 50px;
}
.confirm__td {
  width:;
}
.reservation__btn {
  display: block;
  font-size: 14px;
  color: 	#FFFFFF;
  background-color: #0000FF;
  border: none;
  border-radius: 5px;
  padding: 3px 10px;
  margin: 20px auto 0;
  cursor: pointer;
}
.stripe-button-el {
  display: block;
  margin:0 auto;
}
</style>