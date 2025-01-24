<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use Illuminate\Validation\Rule;

class CreateQuote extends Component
{
    public $subject;
    public $quote_stage;
    public $team;
    public $carrier;
    public $deal_name;
    public $valid_until;
    public $contact_name;
    public $account_name;
    public $billing_street;
    public $billing_city;
    public $billing_state;
    public $billing_code;
    public $billing_country;
    public $shipping_street;
    public $shipping_city;
    public $shipping_state;
    public $shipping_code;
    public $shipping_country;

    // Validation rules for the form
    protected $rules = [
        'subject' => 'required|string|max:255',
        'quote_stage' => 'required|string|max:255',
        'team' => 'required|string|max:255',
        'carrier' => 'required|string|max:255',
        'deal_name' => 'required|string|max:255',
        'valid_until' => 'required|date|after_or_equal:today',
        'contact_name' => 'required|string|max:255',
        'account_name' => 'required|string|max:255',
        'billing_street' => 'required|string|max:255',
        'billing_city' => 'required|string|max:255',
        'billing_state' => 'required|string|max:255',
        'billing_code' => 'required|string|max:20',
        'billing_country' => 'required|string|max:255',
        'shipping_street' => 'required|string|max:255',
        'shipping_city' => 'required|string|max:255',
        'shipping_state' => 'required|string|max:255',
        'shipping_code' => 'required|string|max:20',
        'shipping_country' => 'required|string|max:255',
    ];

    public function render()
    {
        return view('livewire.quote.create-quote');
    }

    // Method to create the quote (or process form submission)
    public function submit()
    {
        $validatedData = $this->validate();

        // You can now create the quote, for example:
        // Quote::create($validatedData);

        session()->flash('message', 'Quote created successfully!');
    }
}
