<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link href='https://fonts.googleapis.com/css?family=Inika' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}" />
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header__logo">
        FasionablyLate
      </div>
      <div class="header-nav">
        @yield('header-nav')
      </div>
    </div>
  </header>
  <main class="main">
    <div class="main__title">
      @yield('name')
    </div>
    @yield('content')
  </main>
</body>

</html>
