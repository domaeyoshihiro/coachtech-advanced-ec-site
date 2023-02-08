<header>
  <div class="header">
    <div class="header__left">
      <div>
        <div class="menu" id="menu">
          <span class="menu__line--top"></span>
          <span class="menu__line--middle"></span>
          <span class="menu__line--bottom"></span>
        </div>
        <nav class="drawer_nav" id="nav">
        <ul class="drawer__nav-list">
          <li class="drawer__nav-list-item"><a class="drawer__nav-list-link" href="/">Home</a></li>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" name="lgout-btn" class="logout__btn">Logout</button>
          </form>
          <form action="/mypage/{{ Auth::user()->id }}" method="GET">
            @csrf
            <button class="mypage__btn">Mypage</button>
          </form>
        </ul>
      </nav>
      </div>
      <h1 class="header__title">Rese</h1>
    </div>
    <div class="header__search">
      <form action="{{ route('search') }}" method="GET" class="header__search__form">
        @csrf
        <select name="area_id" class="header__search--area">
          <option value="">All area</option>
          <option value="1">東京都</option>
          <option value="2">大阪府</option>
          <option value="3">福岡県</option>
        </select>
        <select name="genre_id" class="header__search--genre">
          <option value="">All genre</option>
          <option value="1">寿司</option>
          <option value="2">焼肉</option>
          <option value="3">居酒屋</option>
          <option value="4">イタリアン</option>
          <option value="5">ラーメン</option>
        </select>
        <input type="image" name="submit" src="{{ asset('img/search.png') }}" class="header__search__btn">
        <input type="text" name="shopname" placeholder="Search ..." class="header__search--shopname">
      </form>
    </div>
  </div>
</header>

<script>
const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const nav = document.getElementById("nav");
  nav.classList.toggle('in');
});
</script>

<style>
.header {
  display: flex;
  justify-content: space-between;
  position: sticky;
  left: 0;
  top: 0;
  z-index: 1;
}
.header__left {
  display: flex;
  padding: 0 20px;
}
.header__title {
  font-size: 24px;
  color: #0000FF;
  font-weight: bold;
  padding-top: 25px;
  padding-left: 60px;
}
.drawer_nav {
  display: block;
  position: absolute;
  height: 100vh;
  width: 100%;
  left: -100%;
  top: 0;
  background: #fff;
  transition: .7s;
  text-align: center;
}
.drawer__nav-list {
  padding-top: 80px;
}
.drawer__nav-list-item {
  font-size: 24px;
  margin-top: 30px;
  color: #0000FF;
}
.logout__btn,
.mypage__btn {
  font-size: 24px;
  margin-top: 30px;
  color: #0000FF;
  background-color: #FFFFFF;
  border: none;
  cursor: pointer;
}
.drawer__nav-list-link {
  text-decoration: none;
  color: inherit;
}
.menu {
  display: inline-block;
  width: 36px;
  height: 32px;
  background-color: #0000FF;
  border-radius: 3px;
  box-shadow: 2px 2px 1px #C0C0C0;
  cursor: pointer;
  position: relative;
  left: 40px;
  top: 20px;
  z-index: 10;
}
.menu__line--top {
  display: inline-block;
  width: 30%;
  height: 1px;
  background-color: #FFFFFF;
  position: absolute;
  top: 10px;
  left: 8px;
  transition: 0.5s;
}
.menu__line--middle {
  display: inline-block;
  width: 50%;
  height: 1px;
  background-color: #FFFFFF;
  position: absolute;
  top: 15px;
  left: 8px;
  transition: 0.5s;
}
.menu__line--bottom {
  display: inline-block;
  width: 20%;
  height: 1px;
  background-color: #FFFFFF;
  position: absolute;
  top: 20px;
  left: 8px;
  transition: 0.5s;
}
.menu.open span:nth-of-type(1) {
  width: 60%;
  top: 15px;
  left: 7px;
  transform: rotate(45deg);
}
.menu.open span:nth-of-type(2) {
  opacity: 0;
}
.menu.open span:nth-of-type(3) {
  width: 60%;
  top: 15px;
  left: 7px;
  transform: rotate(-45deg);
}
.in{
  transform: translateX(100%);
}
.header__search {
  background-color: #FFFFFF;
  border-radius: 5px;
  box-shadow: 2px 2px 1px #C0C0C0;
  padding: 10px 0 10px;
  margin-top: 25px;
  margin-right: 50px;
  position: relative;
  z-index: -10;
}
.header__search--area {
  font-size: 14px;
  border: none;
  outline: none;
  padding-left: 10px;
  padding-right: 20px;
  -webkit-appearance: none;
  appearance: none;
  background-image: url({{ asset('img/arrow.png') }});
  background-position: right 0 center;
  background-repeat: no-repeat;
  background-size: 20px 20px;
}
.header__search--genre {
  font-size: 14px;
  border: none;
  border-left: 1px solid #D3D3D3;
  outline: none;
  padding: 5px 15px 5px 5px;
  -webkit-appearance: none;
  appearance: none;
  background-image: url({{ asset('img/arrow.png') }});
  background-position: right 0 center;
  background-repeat: no-repeat;
  background-size: 20px 20px;
}
.header__search--area::-ms-expand {
  display: none;
}
.header__search--genre::-ms-expand {
  display: none;
}
.header__search__btn {
  width: 15px;
  height: 15px;
  border-left: 1px solid #D3D3D3;
  padding: 5px 0 5px 5px;
}
.header__search--shopname {
  font-size: 14px;
  border: none;
  outline: none;
  padding-right: 100px;
}
@media screen and (max-width: 768px) {
  .header {
    display: block;
  }
  .header__search {
    width: 80%;
    margin: 25px auto 0;
  }
  .header__search--shopname {
    padding-right: 20px;
  }
}
@media screen and (max-width: 480px) {
  .header {
    display: block;
  }
  .header__search {
    width: 90%;
    margin: 25px auto 0;
  }
  .header__search--shopname {
    width: 20%;
    padding-right: 0;
  }
}
</style>