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
              <td>{{ $contact['id'] }}
            </tr>
          </table>
        </div>
      </div>
    </div>
  @endif
</div>
