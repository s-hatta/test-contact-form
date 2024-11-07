@extends('layouts.app')

@section('title', 'お問い合わせフォーム')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
@endsection
@section('name', 'Contact')

@section('content')
  <div class="contact__content">
    <form class="contact-form" method="POST" action="/confirm">
      @csrf
      <table class='contact-table'>

        {{-- お名前 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            お名前 <span class="color-red">※</span>
          </th>
          <td class="contact-table__item">
            <input class="contact-table__item--first-name" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 山田">
            <input class="contact-table__item--last-name" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 太郎">
          </td>
        </tr>
        <tr class="contact-table__row--alert">
          <td></td>
          <td>
            @if ($errors->has('first_name'))
              {{ $errors->first('first_name') }}
            @else
              {{ $errors->first('last_name') }}
            @endif
          </td>
        </tr>

        {{-- 性別 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            性別 <span class="color-red">※</span>
          </th>
          <td class="contact-table__item">
            <label><input type="radio" name="gender" value="0" {{ old('gender', '0') === '0' ? 'checked' : '' }}>男性</label>
            <label><input type="radio" name="gender" value="1" {{ old('gender') === '1' ? 'checked' : '' }}>女性</label>
            <label><input type="radio" name="gender" value="2" {{ old('gender') === '2' ? 'checked' : '' }}>その他</label>
          </td>
        </tr>
        <tr class="contact-table__row--alert">
          <td></td>
          <td>
            {{ $errors->first('gender') }}
          </td>
        </tr>

        {{-- メールアドレス --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            メールアドレス <span class="color-red">※</span>
          </th>
          <td class="contact-table__item">
            <input class="contact-table__item--text" type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
          </td>
        </tr>
        <tr class="contact-table__row--alert">
          <td></td>
          <td>
            {{ $errors->first('email') }}
          </td>
        </tr>

        {{-- 電話番号 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            電話番号 <span class="color-red">※</span>
          </th>
          <td class="contact-table__item">
            <input class="contact-table__item--tell" type="text" name='tell_1' value="{{ old('tell_1') }}" placeholder="080">
            <span>-</span>
            <input class="contact-table__item--tell" type="text" name='tell_2' value="{{ old('tell_2') }}" placeholder="1234">
            <span>-</span>
            <input class="contact-table__item--tell" type="text" name='tell_3' value="{{ old('tell_3') }}" placeholder="5678">
          </td>
        </tr>
        <tr class="contact-table__row--alert">
          <td></td>
          <td>
            @if ($errors->has('tell_1'))
              {{ $errors->first('tell_1') }}
            @elseif ($errors->has('tell_2'))
              {{ $errors->first('tell_2') }}
            @else
              {{ $errors->first('tell_3') }}
            @endif
          </td>
        </tr>

        {{-- 住所 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            住所 <span class="color-red">※</span>
          </th>
          <td class="contact-table__item">
            <input class="contact-table__item--text" type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄々谷1-2-3">
          </td>
        </tr>
        <tr class="contact-table__row--alert">
          <td></td>
          <td>
            {{ $errors->first('address') }}
          </td>
        </tr>

        {{-- 建物名 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            建物名
          </th>
          <td class="contact-table__item">
            <input class="contact-table__item--text" type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101">
          </td>
        </tr>
        <tr class="contact-table__row--alert"></tr>

        {{-- お問い合わせの種類 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            お問い合わせの種類 <span class="color-red">※</span>
          </th>
          <td class="contact-table__item">
            <select name="category_id">
              <option value="" hidden>選択してください</option>
              @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" {{ (int) old('category_id') === $category['id'] ? 'selected' : '' }}>
                  {{ $category['content'] }}
              @endforeach
            </select>
          </td>
        </tr>
        <tr class="contact-table__row--alert">
          <td></td>
          <td>
            {{ $errors->first('category_id') }}
          </td>
        </tr>

        {{-- お問い合わせ内容 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            お問い合わせ内容 <span class="color-red">※</span>
          </th>
          <td class="contact-table__item">
            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
          </td>
        </tr>
        <tr class="contact-table__row--alert">
          <td></td>
          <td>
            {{ $errors->first('detail') }}
          </td>
        </tr>

      </table>

      {{-- 確認画面ボタン --}}
      <div class="contact-form__button">
        <button type="submit" class="contact-form__button-submit">確認画面</button>
      </div>
    </form>
  </div>
@endsection
