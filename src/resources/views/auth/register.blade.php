@extends('layouts.auth')
@section('title', '登録画面')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('header-nav')
  <form method="GET" action="{{ route('login') }}">
    @csrf
    <button class="header-nav__button">login</button>
  </form>
@endsection
@section('name', 'Admin')

@section('content')
  <div class="register__content">
    <form class="form" action="{{ route('register') }}" method="post">
      @csrf
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お名前</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="name" value="{{ old('name') }}" />
          </div>
          <div class="form__error">
            @error('name')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" value="{{ old('email') }}" />
          </div>
          <div class="form__error">
            @error('email')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>
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
      <div class="form__button">
        <button class="form__button-submit" type="submit">登録</button>
      </div>
    </form>
  </div>
@endsection
