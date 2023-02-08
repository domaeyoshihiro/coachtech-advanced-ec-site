<div>
  <p class="mail__name">{{ $name }}様</p>
  <table>
    <tr>
      <th class="mail__shopname__th">店名</th>
      <td class="mail__shopname__td">{{ $shopname }}</td>
    </tr>
    <tr>
      <th class="mail__number__th">人数</th>
      <td class="mail__number__td">{{ $number }}</td>
    </tr>
    <tr>
      <th class="mail__reservationtime__th">予約日時</th>
      <td class="mail__reservationtime__td">{{ $reservationdt}}</td>
    </tr>
  </table>
  <p>ご予約当日です。</p>
<div>

<style>
.mail__name {
  font-size: 18px;
}
.mail__shopname__th,
.mail__number__th,
.mail__reservationtime__th {
  text-align: left;
}
</style>