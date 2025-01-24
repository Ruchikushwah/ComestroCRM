<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <!-- First Name -->
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input 
                type="text" 
                id="first_name" 
                wire:model="first_name" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="Enter first name">
            @error('first_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Last Name -->
        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input 
                type="text" 
                id="last_name" 
                wire:model="last_name" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="Enter last name">
            @error('last_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input 
                type="email" 
                id="email" 
                wire:model="email" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="Enter email">
            @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Repeat for all other fields -->
        @foreach ([
            'account_name' => 'Account Name',
            'mobile' => 'Mobile',
            'assistant' => 'Assistant',
            'lead_source' => 'Lead Source',
            'vendor_name' => 'Vendor Name',
            'title' => 'Title',
            'department' => 'Department',
            'date_of_birth' => 'Date of Birth',
            'asst_phone' => 'Assistant Phone',
            'secondary_email' => 'Secondary Email',
            'reporting_to' => 'Reporting To',
            'mailing_street' => 'Mailing Street',
            'mailing_city' => 'Mailing City',
            'mailing_state' => 'Mailing State',
            'mailing_pincode' => 'Mailing Pincode',
            'mailing_country' => 'Mailing Country',
            'other_street' => 'Other Street',
            'other_city' => 'Other City',
            'other_state' => 'Other State',
            'other_pincode' => 'Other Pincode',
            'other_country' => 'Other Country',
            'description' => 'Description',
        ] as $field => $label)
        <div>
            <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
            <input 
                type="text" 
                id="{{ $field }}" 
                wire:model="{{ $field }}" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="Enter {{ strtolower($label) }}">
            @error($field) <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        @endforeach

        <!-- Submit Button -->
        <div>
            <button 
                type="submit" 
                class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Save Contact
            </button>
        </div>
    </form>
</div>
