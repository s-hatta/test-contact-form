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
    public $text;
    public $gender;
    public $category_id;
    public $date;

    public function mount($params = [])
    {
        $this->contact = Contact::where('id', '=', $params['id'])->first();
        $this->text = $params['text'];
        $this->gender = $params['gender'];
        $this->category_id = $params['category_id'];
        $this->date = $params['date'];
    }
    public function render()
    {
        return view('livewire.modal');
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
