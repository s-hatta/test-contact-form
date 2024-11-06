<div>
  <button class="contacts-table__row-item--input" wire:click="openModal()">詳細</button>

  @if ($showModal)
    <div class="modal">
      <div class="modal-wrapper">
        <a href="#" class="close" wire:click="closeModal()">&times;</a>
        <div class="modal-content">

          <table class="modal-table">

            {{-- お名前 --}}
            <tr class="modal-table__row">
            <th class="modal-table__column-header">お名前</th>
            <td class="modal-table__column-item">
                {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
            </td>
            </tr>

            {{-- 性別 --}}
            <tr class="modal-table__row">
            <th class="modal-table__column-header">性別</th>
            <td class="modal-table__column-item">{{$contact->getGenderString($contact['gender'])}}</td>
            </tr>

            {{-- メールアドレス --}}
            <tr class="modal-table__row">
            <th class="modal-table__column-header">メールアドレス</th>
            <td class="modal-table__column-item">{{ $contact['email'] }}</td>
            </tr>

            {{-- 電話番号 --}}
            <tr class="modal-table__row">
            <th class="modal-table__column-header">電話番号</th>
            <td class="modal-table__column-item">{{ $contact['tell'] }}</td>
            </tr>

            {{-- 住所 --}}
            <tr class="modal-table__row">
            <th class="modal-table__column-header">住所</th>
            <td class="modal-table__column-item">{{ $contact['address'] }}</td>
            </tr>

            {{-- 建物名 --}}
            <tr class="modal-table__row">
            <th class="modal-table__column-header">建物名</th>
            <td class="modal-table__column-item">{{ $contact['building'] }}</td>
            </tr>

            {{-- お問い合わせの種類 --}}
            <tr class="modal-table__row">
            <th class="modal-table__column-header">お問い合わせの種類</th>
            <td class="modal-table__column-item">{{ $contact['category']['content'] }}</td>
            </tr>

            {{-- お問い合わせ内容 --}}
            <tr class="modal-table__row">
            <th class="modal-table__column-header">お問い合わせ内容</th>
            <td class="modal-table__column-item">{{ $contact['detail'] }}</td>
            </tr>
          </table>
          <form class="modal-form" method="POST" action={{ route('admin.delete') }}>
            @method('DELETE')
            @csrf
            <input class="id" name="id" value={{ $contact['id'] }} hidden>
            <button type="submit">削除</button>
          </form>
        </div>
      </div>
    </div>
  @endif
</div>
