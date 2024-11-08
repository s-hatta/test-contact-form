@extends('layouts.auth')
@section('title', '登録画面')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('header-nav')
  <a href="/login" class="header-nav__text">login</a>
@endsection
@section('name', 'Admin')

@section('content')
  <div class="register__content">
    <form class="form" action="{{ route('register') }}" method="post">
      @csrf

      {{-- お名前 --}}
      <div class="form-group">
        <div class="form-group__title">
          <span class="form-group__title--item">お名前</span>
        </div>
        <div class="form-group__input">
          <input class="form-group__input--text" type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田　太郎" />
        </div>
        <div class="form-group__error">
          {{ $errors->first('name') }}
        </div>
      </div>

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

      {{-- 登録ボタン --}}
      <div class="form-group__button">
        <button class="form-group__button--submit" type="submit">登録</button>
      </div>
    </form>
  </div>
@endsection
