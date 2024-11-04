@extends('layouts.app')

@section('title', '管理画面')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />
@endsection
@section('name', 'Admin')

@section('content')
  {{-- 検索フォーム --}}
  <div class="contact-search">
    <form>
      <input type="text">
      <select name="gender">
        <option value="" hidden>性別</option>
      </select>
      <select name="category_id">
        <option value="" hidden>お問い合わせの種類</option>
      </select>
      <input type="date">
      <button>検索</button>
      <button>リセット</button>
    </form>
  </div>

  <button>エクスポート</button>

  {{-- ページネーション --}}
  {{ $contacts->links('layouts.pagination') }}

  {{-- お問い合わせテーブル --}}
  <table class='contacts-table'>

    <tr class="contacts-table__row-header">
      <th class="contacts-table__header">お名前</th>
      <th class="contacts-table__header">性別</th>
      <th class="contacts-table__header">メールアドレス</th>
      <th class="contacts-table__header">お問い合わせの種類</th>
      <th class="contacts-table__header"></th>
    </tr>

    @foreach ($contacts as $contact)
      <tr class="contacts-table__row-item">
        <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
        <td>{{ $contact['gender'] }}</td>
        <td>{{ $contact['email'] }}</td>
        <td>{{ $contact['category']['content'] }}</td>
        <td><button>削除</button></td>
      </tr>
    @endforeach
  </table>
@endsection
