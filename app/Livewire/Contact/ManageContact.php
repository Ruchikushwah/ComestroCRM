<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ManageContact extends Component
{
    public function render()
    {
        $contacts = Contact::all();
        return view('livewire.manage-contact',['contacts'=> $contacts]);
    }
}
