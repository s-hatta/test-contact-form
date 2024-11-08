@extends('layouts.app')

@section('title', '入力確認画面')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection
@section('name', 'Confirm')

@section('content')

  {{-- 表示部 --}}
  <div class="confirm-table">
    {{-- お名前 --}}
    <table class="confirm-table__inner">
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お名前</th>
        <td class="confirm-table__text">
          {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
        </td>
      </tr>

      <tr class="confirm-table__row">
        <th class="confirm-table__header">性別</th>
        <td class="confirm-table__text">
          {{ $genderStr }}
        </td>
      </tr>

      {{-- メールアドレス --}}
      <tr class="confirm-table__row">
        <th class="confirm-table__header">メールアドレス</th>
        <td class="confirm-table__text">
          {{ $contact['email'] }}
        </td>
      </tr>

      {{-- 電話番号 --}}
      <tr class="confirm-table__row">
        <th class="confirm-table__header">電話番号</th>
        <td class="confirm-table__text">
          {{ $contact['tell1'] }}{{ $contact['tell2'] }}{{ $contact['tell3'] }}
        </td>
      </tr>

      {{-- 住所 --}}
      <tr class="confirm-table__row">
        <th class="confirm-table__header">住所</th>
        <td class="confirm-table__text">
          {{ $contact['address'] }}
        </td>
      </tr>

      {{-- 建物名 --}}
      <tr class="confirm-table__row">
        <th class="confirm-table__header">建物名</th>
        <td class="confirm-table__text">
          {{ $contact['building'] }}
        </td>
      </tr>

      {{-- お問い合わせの種類 --}}
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせの種類</th>
        <td class="confirm-table__text">
          {{ $category['content'] }}
        </td>
      </tr>

      {{-- お問い合わせ内容 --}}
      <tr class="confirm-table__row">
        <th class="confirm-table__header">お問い合わせ内容</th>
        <td class="confirm-table__text">
          {{ $contact['detail'] }}
        </td>
      </tr>
    </table>
  </div>

  {{-- 送信部 --}}
  <form class="form" action="/thanks" method="post">
    @csrf
    <input type="text" name="last_name" value="{{ $contact['last_name'] }}" hidden />
    <input type="text" name="first_name" value="{{ $contact['first_name'] }}" hidden />
    <input type="text" name="gender" value="{{ $contact['gender'] }}" hidden />
    <input type="email" name="email" value="{{ $contact['email'] }}" hidden />
    <input type="tell1" name="tell1" value="{{ $contact['tell1'] }}" hidden />
    <input type="tell2" name="tell2" value="{{ $contact['tell2'] }}" hidden />
    <input type="tell3" name="tell3" value="{{ $contact['tell3'] }}" hidden />
    <input type="text" name="address" value="{{ $contact['address'] }}" hidden />
    <input type="text" name="building" value="{{ $contact['building'] }}" hidden />
    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" hidden />
    <input type="text" name="detail" value="{{ $contact['detail'] }}" hidden />
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
      <button class="form__button-edit" type="submit" name="back" value="back">修正</button>
    </div>
  </form>
@endsection
