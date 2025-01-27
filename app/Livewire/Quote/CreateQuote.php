<?php

namespace App\Livewire\Quote;
use App\Models\Quote;
use Livewire\Component;
use Illuminate\Validation\Rule;

class CreateQuote extends Component
{
    public $quote_id;
    
    public $quotes, $quoteId, $subject, $quote_stage, $team, $carrier, $deal_name, $valid_until, $contact_name, $account_name;
    public $billing_street, $billing_city, $billing_state, $billing_code, $billing_country;
    public $shipping_street, $shipping_city, $shipping_state, $shipping_code, $shipping_country;
    protected $rules = [
        'subject' => 'nullable|string',
        'quote_stage' => 'nullable|string',
        'team' => 'nullable|string',
        'carrier' => 'nullable|string',
        'deal_name' => 'nullable|string',
        'valid_until' => 'nullable|date', // Allow valid date or null
        'contact_name' => 'nullable|string',
        'account_name' => 'nullable|string',
        'billing_street' => 'nullable|string',
        'billing_city' => 'nullable|string',
        'billing_state' => 'nullable|string',
        'billing_code' => 'nullable|string',
        'billing_country' => 'nullable|string',
        'shipping_street' => 'nullable|string',
        'shipping_city' => 'nullable|string',
        'shipping_state' => 'nullable|string',
        'shipping_code' => 'nullable|string',
        'shipping_country' => 'nullable|string',

     ];
    public function mount($id = null)
    {
        if ($id) {
            // Load lead data if $id is provided
            $quote = Quote::find($id);
            if ($quote) {
                $this->quote_id = $quote->id;
                $this->subject = $quote->subject;
                $this->quote_stage = $quote->quote_stage;
                $this->carrier = $quote->carrier;
                $this->deal_name = $quote->deal_name;
                $this->valid_until = $quote->valid_until;
                $this->contact_name = $quote->contact_name;
                $this->account_name = $quote->account_name;
                $this->billing_street = $quote->billing_street;
                $this->billing_city = $quote->billing_city;
                $this->billing_state = $quote->billing_state;
                $this->billin_code = $quote->billin_code;
                $this->billing_country= $quote->billing_country;
                $this->shipping_street = $quote->shipping_street;
                $this->shipping_city = $quote->shipping_city;
                $this->shipping_state = $quote->shipping_state;
                $this->shipping_code = $quote->shipping_code;
                $this->shipping_country = $quote->shipping_country;
            
            } else {
                session()->flash('error', 'Qoute not found.');
                return view('livewire.quote.create-quote');
}
        }
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->quote_id) {
            //Quote create
            Quote::find($this->quote_id)->update($validatedData);
            session()->flash('message', 'Quote updated successfully!');
        } else {
            //quote update
            Quote::create($validatedData);
            session()->flash('message', 'Quote created successfully!');
        }

        // return redirect()->route('crm.quote'); // Redirect back to create route
    }

    public function render()
    {
        return view('livewire.quote.create-quote');
    }
}

