<div>
  <button class="contacts-table__row-item--input" wire:click="openModal()">詳細</button>

  @if ($showModal)
    <div class="modal">
      <div class="modal-wrapper">
        <div class="modal-close">
          <a href="#" class="modal-close__button" wire:click="closeModal()">&times;</a>
        </div>
        <div class="modal-content">

          <table class="modal-table">

            {{-- お名前 --}}
            <tr class="modal-table__row">
            <td class="modal-table__column-header">お名前</td>
            <td class="modal-table__column-item">
                {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
            </td>
            </tr>

            {{-- 性別 --}}
            <tr class="modal-table__row">
            <td class="modal-table__column-header">性別</td>
            <td class="modal-table__column-item">{{$contact->getGenderString($contact['gender'])}}</td>
            </tr>

            {{-- メールアドレス --}}
            <tr class="modal-table__row">
            <td class="modal-table__column-header">メールアドレス</td>
            <td class="modal-table__column-item">{{ $contact['email'] }}</td>
            </tr>

            {{-- 電話番号 --}}
            <tr class="modal-table__row">
            <td class="modal-table__column-header">電話番号</td>
            <td class="modal-table__column-item">{{ $contact['tell'] }}</td>
            </tr>

            {{-- 住所 --}}
            <tr class="modal-table__row">
            <td class="modal-table__column-header">住所</td>
            <td class="modal-table__column-item">{{ $contact['address'] }}</td>
            </tr>

            {{-- 建物名 --}}
            <tr class="modal-table__row">
            <td class="modal-table__column-header">建物名</td>
            <td class="modal-table__column-item">{{ $contact['building'] }}</td>
            </tr>

            {{-- お問い合わせの種類 --}}
            <tr class="modal-table__row">
            <td class="modal-table__column-header">お問い合わせの種類</td>
            <td class="modal-table__column-item">{{ $contact['category']['content'] }}</td>
            </tr>

            {{-- お問い合わせ内容 --}}
            <tr class="modal-table__row">
            <td class="modal-table__column-header">お問い合わせ内容</td>
            <td class="modal-table__column-item">{{ $contact['detail'] }}</td>
            </tr>
          </table>
          <form class="modal-form" method="POST" action="/admin">
            @method('DELETE')
            @csrf
            <input type="hidden" name="text" value={{$text}}>
            <input type="hidden" name="gender" value={{$gender}}>
            <input type="hidden" name="category_id" value={{$category_id}}>
            <input type="hidden" name="date" value={{$date}}>
            <input type="hidden" name="id" value={{ $contact['id'] }} hidden>
            <button class="modal-form__submit" type="submit">削除</button>
          </form>
        </div>
      </div>
    </div>
  @endif
</div>
