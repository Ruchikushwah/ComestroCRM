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
                // Dynamically assign contact attributes to component properties
                foreach ($contact->getAttributes() as $key => $value) {
                    if (property_exists($this, $key)) {
                        $this->$key = $value;
                    }
                }
            } else {
                session()->flash('error', 'Contact Not Found.');
                return redirect()->route('create.contact');
            }
        }
    }

    public function save()
    {
        // Validate data
        $validatedData = $this->validate();

        if ($this->contact_id) {
            // Update existing contact
            $contact = Contact::findOrFail($this->contact_id);
            $contact->update($validatedData);
            session()->flash('message', 'Contact updated successfully!');
        } else {
            // Create new contact
            Contact::create($validatedData);
            session()->flash('message', 'Contact created successfully!');
        }

        return redirect()->route('crm.contact'); // Redirect to manage contacts
    }

    public function render()
    {
        return view('livewire.contact.create-contact');
    }
}
