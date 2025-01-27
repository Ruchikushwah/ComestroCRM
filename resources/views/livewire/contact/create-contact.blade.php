<div class="w-full mx-6 py-6 p-6 px-4 m-4 bg-slate-200 shadow-md rounded-md">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- First Name -->
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input
                type="text"
                id="first_name"
                wire:model="first_name"
                class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                class="mt-1 block w-full rounded-md border-gray-300 bg-white py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm py-2 px-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="Enter email">
            @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Other Fields -->
        @foreach ([
            'account_name' => 'Account Name',
            'mobile' => 'Mobile',
            'assistant' => 'Assistant',
            'lead_source' => 'Lead Source',
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
                
                @if($field == 'date_of_birth')
                    <input
                        type="date"
                        id="{{ $field }}"
                        wire:model="{{ $field }}"
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Enter {{ strtolower($label) }}">
                @elseif(in_array($field, ['mobile', 'asst_phone', 'mailing_pincode', 'other_pincode']))
                    <input
                        type="tel"
                        id="{{ $field }}"
                        wire:model="{{ $field }}"
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Enter {{ strtolower($label) }}">
                @else
                    <input
                        type="text"
                        id="{{ $field }}"
                        wire:model="{{ $field }}"
                        class="mt-1 block w-full rounded-md border-gray-300 bg-white shadow-sm py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        placeholder="Enter {{ strtolower($label) }}">
                @endif
                
                @error($field) <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
        @endforeach

        <!-- Submit Button -->
        <div class="col-span-2">
            <button
                type="submit"
                class="w-full sm:w-auto px-4 py-2 text-white rounded-md bg-slate-500"  wire:navigate>
                {{ $contact_id ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
