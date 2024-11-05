@extends('layouts.auth')

@section('title', '管理画面')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />
@endsection
@section('header-nav')
  @if (Auth::check())
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="header-nav__button">logout</button>
    </form>
  @endif
@endsection
@section('name', 'Admin')

@section('content')
  {{-- 検索フォーム --}}
  <div class="contact-search">
    <form class="search-form" method="POST" action="/admin">
      @csrf
      <div class="search-form__item">
        {{-- 検索欄（名前、メールアドレス） --}}
        <div class="search-form__item--text">
          <input name="text" type="text" class="search-form__item--text-input" placeholder="名前やメールドアレスを入力してください">
        </div>
        {{-- 性別 --}}
        <div class="search-form__gender">
          <select name="gender" class="search-form__item--gender-select">
            <option value="" hidden>性別</option>
            <option value="4">全て</option>
            <option value="0">男性</option>
            <option value="1">女性</option>
            <option value="2">その他</option>
          </select>
        </div>
        <div class="search-form__category">
          <select name="category_id" class="search-form__item--category-select">
            <option value="" hidden>お問い合わせの種類</option>
            @foreach ($categories as $category)
              <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="search-form__item--date">
          <input name="date" type="date" class="search-form__item--date-input">
        </div>
      </div>
      <div class="search-form__submit">
        <button class="search-form__submit-button" type="submit">検索</button>
      </div>
    </form>
    <div class="reset-form__submit">
      <a href="/admin">リセット</a>
    </div>
  </div>

  <div class="control">
    <div class="control__export">
      <button class="control__export--button">エクスポート</button>
    </div>
    <div class="control__pagination">
      {{ $contacts->appends(request()->query())->links('layouts.pagination') }}
    </div>
  </div>

  {{-- お問い合わせテーブル --}}
  <table class='contacts-table'>

    <tr class="contacts-table__row-header">
      <th class="contacts-table__header-name">お名前</th>
      <th class="contacts-table__header-gender">性別</th>
      <th class="contacts-table__header-email">メールアドレス</th>
      <th class="contacts-table__header-category">お問い合わせの種類</th>
      <th class="contacts-table__header-button"></th>
    </tr>

    @foreach ($contacts as $contact)
      <tr class="contacts-table__row-item">
        <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
        <td>
          @switch($contact['gender'])
            @case(0)
              男性
            @break

            @case(1)
              女性
            @break

            @default
              その他
          @endswitch
        </td>
        <td>{{ $contact['email'] }}</td>
        <td>{{ $contact['category']['content'] }}</td>
        <td><button class="contacts-table__row-item--input">詳細</button></td>
      </tr>
    @endforeach
  </table>
@endsection
