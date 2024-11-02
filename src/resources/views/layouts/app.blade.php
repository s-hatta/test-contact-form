<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
</head>

<body>

  <header class="header">
    <div class="header__inner">
      <div class="header__logo">
        FasionablyLate
      </div>
    </div>
  </header>
  @yield('name')
  @yield('content')
</body>

</html>
