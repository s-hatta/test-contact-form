@extends('layouts.app')

@section('title', '入力確認画面')
@section('name', 'Confirm')

@section('content')
  <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
      {{-- お名前 --}}
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="text" name="name" value="{{ $contact['first_name'] }}" readonly />
            <input type="text" name="name" value="{{ $contact['last_name'] }}" readonly />
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            @switch($contact['gender'])
              @case(0)
                男性
              @break

              @case(1)
                女性
              @break

              @case(2)
                その他
              @break
            @endswitch
          </td>
        </tr>

        {{-- メールアドレス --}}
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>

        {{-- 電話番号 --}}
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" name="tel" value="{{ $contact['tell'] }}" readonly />
          </td>
        </tr>

        {{-- 住所 --}}
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        </tr>

        {{-- 建物名 --}}
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>

        {{-- お問い合わせ内容 --}}
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
      <button class="form__button-edit" type="submit">修正</button>
    </div>
  </form>
@endsection
