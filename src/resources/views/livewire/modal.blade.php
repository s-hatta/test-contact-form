<div>
  <button class="contacts-table__row-item--input" wire:click="openModal()">詳細</button>

  @if ($showModal)
    <div class="modal">
      <div class="modal-wrapper">
        <a href="#" class="close" wire:click="closeModal()">&times;</a>
        <div class="modal-content">
          <table>
            <tr>
              <th>お名前</th>
              <td>{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
            </tr>
            <tr>
              <th>性別</th>
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
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td>{{ $contact['email'] }}</td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td>{{ $contact['tell'] }}</td>
            </tr>
            <tr>
              <th>住所</th>
              <td>{{ $contact['address'] }}</td>
            </tr>
            <tr>
              <th>建物名</th>
              <td>{{ $contact['building'] }}</td>
            </tr>
            <tr>
              <th>お問い合わせの種類</th>
              <td>{{ $contact['category']['content'] }}</td>
            </tr>
            <tr>
              <th>お問い合わせ内容</th>
              <td>{{ $contact['detail'] }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  @endif
</div>
