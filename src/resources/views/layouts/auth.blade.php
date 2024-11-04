@extends('layouts.app')

@section('header-extend')
  <div class="header-nav">
    @if (Auth::check())
      <button class="header-nav__button-logout">logput</button>
    @else
      <button class="header-nav__button-login">login</button>
    @endif
  </div>
@endsection
