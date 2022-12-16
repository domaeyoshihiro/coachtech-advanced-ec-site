<header>
  <div class="header">
    <div>
      <div class="menu" id="menu">
        <span class="menu__line--top"></span>
        <span class="menu__line--middle"></span>
        <span class="menu__line--bottom"></span>
      </div>
      <nav class="drawer_nav" id="nav">
        <ul class="drawer__nav-list">
          <li class="drawer__nav-list-item"><a class="drawer__nav-list-link" href="/">Home</a></li>
          <li class="drawer__nav-list-item"><a class="drawer__nav-list-link" href="/register">Registration</a></li>
          <li class="drawer__nav-list-item"><a class="drawer__nav-list-link" href="/login">Login</a></li>
        </ul>
      </nav>
    </div>
    <h1 class="header__title">Rese</h1>
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
  padding: 0 20px;
  position: sticky;
  left: 0;
  top: 0;
  z-index: 1;
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
</style>

