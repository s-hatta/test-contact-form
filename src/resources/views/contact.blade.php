@extends('layouts.app')

@section('title', 'お問い合わせフォーム')
@section('name', 'Contact')

@section('content')
  <div class="contact__content">
    <form class="contact-form">
      <table class='contact-table'>

        {{-- お名前 --}}
        <tr class="contact-table__row">
          <td class="contact-table__item-name">
            お名前 ※
          </td>
          <td>
            <input type="text" placeholder="例: 山田">
            <input type="text" placeholder="例: 太郎">
          </td>
        </tr>

        {{-- 性別 --}}
        <tr class="contact-table__row">
          <td class="contact-table__item-name">
            性別 ※
          </td>
          <td>
            <input type="radio" checked name="gender">男性
            <input type="radio" name="gender">女性
            <input type="radio" name="gender">その他
          </td>
        </tr>

        {{-- メールアドレス --}}
        <tr class="contact-table__row">
          <td class="contact-table__item-name">
            メールアドレス ※
          </td>
          <td>
            <input type="text" placeholder="例: test@example.com">
          </td>
        </tr>

        {{-- 電話番号 --}}
        <tr class="contact-table__row">
          <td class="contact-table__item-name">
            電話番号 ※
          </td>
          <td>
            <input type="text" placeholder="080">
            -
            <input type="text" placeholder="1234">
            -
            <input type="text" placeholder="5678">
          </td>
        </tr>

        {{-- 住所 --}}
        <tr class="contact-table__row">
          <td class="contact-table__item-name">
            住所 ※
          </td>
          <td>
            <input type="text" placeholder="例: 東京都渋谷区千駄々谷1-2-3">
          </td>
        </tr>

        {{-- 建物名 --}}
        <tr class="contact-table__row">
          <td class="contact-table__item-name">
            建物名
          </td>
          <td>
            <input type="text" placeholder="例: 千駄ヶ谷マンション101">
          </td>
        </tr>

        {{-- お問い合わせの種類 --}}
        <tr class="contact-table__row">
          <td class="contact-table__item-name">
            お問い合わせの種類 ※
          </td>
          <td>
            <select required>
              <option value="" hidden>選択してください</option>
            </select>
          </td>
        </tr>

        {{-- お問い合わせ内容 --}}
        <tr class="contact-table__row">
          <td class="contact-table__item-name">
            お問い合わせ内容 ※
          </td>
          <td>
            <textarea placeholder="お問い合わせ内容をご記載ください"></textarea>
          </td>
        </tr>

      </table>

      <button class="contact-form__button--submit">確認画面</button>
    </form>
  </div>
@endsection
