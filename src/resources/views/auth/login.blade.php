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
    <form class="form" action="/login" method="post">
      @csrf

      {{-- メールアドレス --}}
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="email" value="{{ old('email') }}" />
          </div>
          <div class="form__error">
            @error('email')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      {{-- パスワード --}}
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">パスワード</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="password" name="password" />
          </div>
          <div class="form__error">
            @error('password')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      {{-- ログインボタン --}}
      <div class="form__button">
        <button class="form__button-submit" type="submit">ログイン</button>
      </div>
    </form>
  </div>
@endsection
