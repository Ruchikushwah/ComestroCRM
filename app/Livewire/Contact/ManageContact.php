<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class ManageContact extends Component
{

    public function render()
    {
        $contacts = Contact::all();
        return view('livewire.contact.manage-contact', ['contacts' => $contacts]);
    }
}
