<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Models\Quote;

class ManageQuote extends Component
{
    public function render()
    {
        $quotes = Quote::all();
        return view('livewire.quote.manage-quote', ['quotes' => $quotes]);
    }
}
