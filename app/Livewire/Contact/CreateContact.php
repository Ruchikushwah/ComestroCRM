<?php

namespace App\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class CreateContact extends Component
{
    public $contact_id;
    
    

    public $first_name;
    public $last_name;
    public $account_name;
    public $email;
    public $mobile;
    public $assistant;
    public $lead_source;
    public $title;
    public $department;
    public $date_of_birth;
    public $asst_phone;
    public $secondary_email;
    public $reporting_to;
    public $mailing_street;
    public $mailing_city;
    public $mailing_state;
    public $mailing_pincode;
    public $mailing_country;
    public $other_street;
    public $other_city;
    public $other_state;
    public $other_pincode;
    public $other_country;
    public $description;

    protected $rules = [
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'account_name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'mobile' => 'nullable|numeric',
        'assistant' => 'nullable|string|max:255',
        'lead_source' => 'nullable|string|max:255',
        'title' => 'nullable|string|max:255',
        'department' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'asst_phone' => 'nullable|numeric',
        'secondary_email' => 'nullable|email|max:255',
        'reporting_to' => 'nullable|string|max:255',
        'mailing_street' => 'nullable|string|max:255',
        'mailing_city' => 'nullable|string|max:255',
        'mailing_state' => 'nullable|string|max:255',
        'mailing_pincode' => 'nullable|numeric',
        'mailing_country' => 'nullable|string|max:255',
        'other_street' => 'nullable|string|max:255',
        'other_city' => 'nullable|string|max:255',
        'other_state' => 'nullable|string|max:255',
        'other_pincode' => 'nullable|numeric',
        'other_country' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ];
    
    
    public function mount($id = null)
    {
        if ($id) {
            // Load contact data if $id is provided
            $contact = Contact::find($id);
            if ($contact) {
                $this->first_name = $contact->first_name;
                $this->last_name = $contact->last_name;
                $this->account_name = $contact->account_name;
                $this->email = $contact->email;
                $this->mobile = $contact->mobile;
                $this->assistant = $contact->assistant;
                $this->lead_source = $contact->lead_source;
                $this->title = $contact->title;
                $this->department = $contact->department;
                $this->date_of_birth = $contact->date_of_birth;
                $this->asst_phone = $contact->asst_phone;
                $this->secondary_email = $contact->secondary_email;
                $this->reporting_to = $contact->reporting_to;
                $this->mailing_street = $contact->mailing_street;
                $this->mailing_city = $contact->mailing_city;
                $this->mailing_state = $contact->mailing_state;
                $this->mailing_pincode = $contact->mailing_pincode;
                $this->mailing_country = $contact->mailing_country;
                $this->other_street = $contact->other_street;
                $this->other_city = $contact->other_city;
                $this->other_state = $contact->other_state;
                $this->other_pincode = $contact->other_pincode;
                $this->other_country = $contact->other_country;
                $this->description = $contact->description;
            } else {
                session()->flash('error', 'Contact Not Found.');
                return redirect()->route('create.contact');
            }
        }
    }
    public function save()
    {
        $validatedData = $this->validate();


        if ($this->contact_id) {
            // Update existing contact
            Contact::find($this->contact_id)->update($validatedData);
            session()->flash('message', 'Contact updated successfully!');
        } else {
            // Create new Contact
            Contact::create($validatedData);
            session()->flash('message', 'Contact created successfully!');
        }


        return redirect()->route('contact.manage-contact'); // Redirect back to create route
    }

    public function render()
    {
        return view('livewire.contact.create-contact');
    }
}
