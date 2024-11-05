<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact;

class Modal extends Component
{
    use WithPagination;
    public $showModal = false;
    public $contact;

    public function mount($params = [])
    {
        $this->contact = Contact::where('id', '=', $params)->first();
    }
    public function render()
    {
        return view('livewire.modal', ['contact' => $this->contact]);
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
