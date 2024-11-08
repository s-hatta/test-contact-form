@extends('layouts.auth')
@section('title', 'ログイン画面')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('header-nav')
  <a href="/register" class="header-nav__text">register</a>
@endsection
@section('name', 'Login')

@section('content')
  <div class="login__content">
    <form class="form" action="{{ route('login') }}" method="post">
      @csrf

      {{-- メールアドレス --}}
      <div class="form-group">
        <div class="form-group__title">
          <span class="form-group__title--item">メールアドレス</span>
        </div>
        <div class="form-group__input">
          <input class="form-group__input--text" type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" />
        </div>
        <div class="form-group__error">
          {{ $errors->first('email') }}
        </div>
      </div>

      {{-- パスワード --}}
      <div class="form-group">
        <div class="form-group__title">
          <span class="form-group__title--item">パスワード</span>
        </div>
        <div class="form-group__input">
          <input class="form-group__input--text" type="password" name="password" placeholder="例: coachtech1106" />
        </div>
        <div class="form-group__error">
          {{ $errors->first('password') }}
        </div>
      </div>

      {{-- ログインボタン --}}
      <div class="form-group__button">
        <button class="form-group__button--submit" type="submit">ログイン</button>
      </div>
    </form>
  </div>
@endsection
