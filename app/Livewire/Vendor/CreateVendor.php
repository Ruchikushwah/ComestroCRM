<?php

namespace App\Livewire\Vendor;

use Livewire\Component;

class CreateVendor extends Component
{
    // Public properties to store form data
    public $vendor_owner;
    public $vendor_name;
    public $phone;
    public $email;
    public $website;
    public $category;
    public $gl_account;
    public $email_opt_out;
    public $street;
    public $city;
    public $state;
    public $zip_code;
    public $country;
    public $description;

    // Validation rules for the form
    protected $rules = [
        'vendor_owner' => 'nullable|string|max:255',
        'vendor_name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'website' => 'nullable|url|max:255',
        'category' => 'nullable|string|max:255',
        'gl_account' => 'nullable|string|max:50',
        'email_opt_out' => 'boolean',
        'street' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'zip_code' => 'nullable|string|max:20',
        'country' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ];

    // Handle form submission
    public function submit()
    {
        // Validate the form data
        $validatedData = $this->validate();

        // Example: Save the vendor data to the database
        // Vendor::create($validatedData);

        session()->flash('message', 'Vendor created successfully!');
    }

    public function render()
    {
        return view('livewire.vendor.create-vendor');
    }
}
