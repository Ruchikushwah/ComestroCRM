<?php

namespace App\Livewire;

use App\Models\Lead;
use Livewire\Component;

class CreateLead extends Component
{
    public $lead_owner;
    public $first_name;
    public $last_name;
    public $title;
    public $company;
    public $phone;
    public $email;
    public $website;
    public $lead_source;
    public $lead_status;
    public $industry;
    public $annual_revenue;
    public $no_of_employees;
    public $rating;
    public $street;
    public $city;
    public $state;
    public $zip_code;
    public $country;
    public $description;

    protected $rules = [
        'lead_owner' => 'required|string',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'title' => 'nullable|string',
        'company' => 'nullable|string',
        'phone' => 'nullable|string',
        'email' => 'required|email',
        'website' => 'nullable|url',
        'lead_source' => 'nullable|string',
        'lead_status' => 'nullable|string',
        'industry' => 'nullable|string',
        'annual_revenue' => 'nullable|numeric',
        'no_of_employees' => 'nullable|integer',
        'rating' => 'nullable|string',
        'street' => 'nullable|string',
        'city' => 'nullable|string',
        'state' => 'nullable|string',
        'zip_code' => 'nullable|string',
        'country' => 'nullable|string',
        'description' => 'nullable|string',
    ];

    public function save()
    {
        // Validate the data before saving
        $validatedData = $this->validate();

        // Create a new lead and save it to the database
        Lead::create($validatedData);

        // Reset the form fields
        $this->reset();

        // Optionally send a success message
        session()->flash('message', 'Lead successfully created!');
    }
    

    public function render()
    {
        return view('livewire.create-lead');
    }
}
