@extends('layouts.auth')

@section('title', '管理画面')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />
  @livewireStyles
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
          <input name="text" type="text" class="search-form__item--text-input" placeholder="名前やメールドアレスを入力してください" value="{{ isset($request['text']) ? $request['text'] : '' }}">
        </div>
        {{-- 性別 --}}
        <div class="search-form__gender">
          <select name="gender" class="search-form__item--gender-select">
            <option value="" hidden>性別</option>
            <option value="4" {{ isset($request['gender']) ? ($request['gender'] == '4' ? 'selected' : '') : '' }}>全て</option>
            <option value="0" {{ isset($request['gender']) ? ($request['gender'] == '0' ? 'selected' : '') : '' }}>男性</option>
            <option value="1" {{ isset($request['gender']) ? ($request['gender'] == '1' ? 'selected' : '') : '' }}>女性</option>
            <option value="2" {{ isset($request['gender']) ? ($request['gender'] == '2' ? 'selected' : '') : '' }}>その他</option>
          </select>
        </div>
        {{-- お問い合わせの種類 --}}
        <div class="search-form__category">
          <select name="category_id" class="search-form__item--category-select">
            <option value="" hidden>お問い合わせの種類</option>
            @foreach ($categories as $category)
              <option value="{{ $category['id'] }}" {{ isset($request['category_id']) ? ($request['category_id'] == $category['id'] ? 'selected' : '') : '' }}>{{ $category['content'] }}</option>
            @endforeach
          </select>
        </div>
        {{-- 日付 --}}
        <div class="search-form__item--date">
          <input name="date" type="date" class="search-form__item--date-input" value="{{ isset($request['date']) ? $request['date'] : '' }}">
        </div>
      </div>
      {{-- 検索ボタン --}}
      <div class="search-form__submit">
        <button class="search-form__submit-button" type="submit">検索</button>
      </div>
    </form>
    {{-- リセットボタン --}}
    <div class="reset-form__submit">
      <a href="/admin">リセット</a>
    </div>
  </div>

  {{-- その他操作系 --}}
  <div class="control">
    {{-- 検索結果をCSVで出力(ブラウザからダウンロード) --}}
    <div class="control__export">
      <form class="export-form" method="GET" action="{{ route('admin.export') }}">
        <input type="hidden" name="text" value="{{ request('text') }}">
        <input type="hidden" name="gender" value="{{ request('gender') }}">
        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
        <input type="hidden" name="date" value="{{ request('date') }}">
        <button class="control__export--button">エクスポート</button>
      </form>
    </div>
    {{-- ページネーション --}}
    <div class="control__pagination">
      {{ $contacts->appends(request()->query())->links('layouts.pagination') }}
    </div>
  </div>

  {{-- お問い合わせテーブル --}}
  <table class='contacts-table'>
    {{-- 項目名 --}}
    <tr class="contacts-table__row-header">
      <th class="contacts-table__header-name">お名前</th>
      <th class="contacts-table__header-gender">性別</th>
      <th class="contacts-table__header-email">メールアドレス</th>
      <th class="contacts-table__header-category">お問い合わせの種類</th>
      <th class="contacts-table__header-button"></th>
    </tr>
    {{-- 項目(1行1レコード) --}}
    @foreach ($contacts as $contact)
      <tr class="contacts-table__row-item">
        <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
        <td>{{ $contact->getGenderString($contact['gender']) }}</td>
        <td>{{ $contact['email'] }}</td>
        <td>{{ $contact['category']['content'] }}</td>
        <td>
          <livewire:modal :params="$contact['id']" />
        </td>
      </tr>
    @endforeach
  </table>
  @livewireScripts
@endsection
