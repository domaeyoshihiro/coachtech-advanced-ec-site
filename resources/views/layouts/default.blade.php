<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>飲食店アプリ</title>
  <link rel="stylesheet" href="../../css/reset.css">
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>

<body class="container">
  @yield('content')
</body>

<style>
.container {
  background-color: #F5F5F5;
}
</style>