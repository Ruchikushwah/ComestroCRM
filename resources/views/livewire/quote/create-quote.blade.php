<div class="w-full mx-auto p-6 bg-gray-200 shadow-md rounded-md">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class=" w-full  p-4 bg-white shadow-md rounded-lg grid grid-cols-2 gap-5">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Create a Quote</h2>

        <div class="mb-4">
            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
            <input type="text" id="subject" wire:model="subject"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('subject')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="quote_stage" class="block text-sm font-medium text-gray-700">Quote Stage</label>
            <input type="text" id="quote_stage" wire:model="quote_stage"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('quote_stage')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="team" class="block text-sm font-medium text-gray-700">Team</label>
            <input type="text" id="team" wire:model="team"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('team')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="carrier" class="block text-sm font-medium text-gray-700">Carrier</label>
            <input type="text" id="carrier" wire:model="carrier"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('carrier')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deal_name" class="block text-sm font-medium text-gray-700">Deal Name</label>
            <input type="text" id="deal_name" wire:model="deal_name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('deal_name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

            
            <div>
                <label for="carrier" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="carrier" wire:model="carrier"
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                    placeholder="Enter carrier">
                @error('carrier')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            @foreach ([
        'deal_name' => 'Deal_name',
        'valid_until' => 'Valid_until',
        'contact_name' => 'Contact_name',
        'account_name' => 'Account_name',
        'billing_street' => 'Billing_street',
        'billing_city' => 'Billing_city',
        'billing_state' => 'Billing_state',
        'billing_code' => 'Billing_code',
        'billing_country' => 'Billing_country',
        'shipping_street' => 'Shipping_street',
        'shipping_city' => 'Shipping_city',
        'shipping_state' => 'Shipping_state',
        'shipping_code' => 'Shipping_code',
        'shipping_country' => 'Shipping_country',
    ] as $field => $label)
                <div>
                    <label for="{{ $field }}"
                        class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                    <input type="text" id="{{ $field }}" wire:model="{{ $field }}"
                        class="mt-1 block w-full rounded-md border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                        placeholder="Enter {{ strtolower($label) }}">
                    @error($field)
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
            <div>
                <button type="submit" class="bg-teal-500 hover:bg-teal-800 text-white px-4 py-2 rounded-lg " >{{ $quote_id ? 'Update' : 'Create' }}</button>
            </div>
    </form>
</div>
