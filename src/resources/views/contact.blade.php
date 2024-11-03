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
            お名前 ※
          </th>
          <td>
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 山田">
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 太郎">
          </td>
        </tr>

        {{-- 性別 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            性別 ※
          </th>
          <td>
            <input type="radio" name="gender" value="0" {{ old('gender', '0') === '0' ? 'checked' : '' }}>男性
            <input type="radio" name="gender" value="1" {{ old('gender') === '1' ? 'checked' : '' }}>女性
            <input type="radio" name="gender" value="2" {{ old('gender') === '2' ? 'checked' : '' }}>その他
          </td>
        </tr>

        {{-- メールアドレス --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            メールアドレス ※
          </th>
          <td>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
          </td>
        </tr>

        {{-- 電話番号 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            電話番号 ※
          </th>
          <td>
            <input type="text" name='tell_1' value="{{ old('tell_1') }}" placeholder="080">
            -
            <input type="text" name='tell_2' value="{{ old('tell_2') }}" placeholder="1234">
            -
            <input type="text" name='tell_3' value="{{ old('tell_3') }}" placeholder="5678">
          </td>
        </tr>

        {{-- 住所 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            住所 ※
          </th>
          <td>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄々谷1-2-3">
          </td>
        </tr>

        {{-- 建物名 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            建物名
          </th>
          <td>
            <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101">
          </td>
        </tr>

        {{-- お問い合わせの種類 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            お問い合わせの種類 ※
          </th>
          <td>
            <select name="category_id" required>
              <option value="" hidden>選択してください</option>
              @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" {{ (int) old('category_id') === $category['id'] ? 'selected' : '' }}>
                  {{ $category['content'] }}
              @endforeach
            </select>
          </td>
        </tr>

        {{-- お問い合わせ内容 --}}
        <tr class="contact-table__row">
          <th class="contact-table__header">
            お問い合わせ内容 ※
          </th>
          <td>
            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
          </td>
        </tr>

      </table>

      <div class="contact-form__button">
        <button type="submit" class="contact-form__button-submit">確認画面</button>
      </div>
    </form>
  </div>
@endsection
