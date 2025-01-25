<div class="w-full mx-auto p-6 bg-gray-200 shadow-md rounded-md">
    @if (session()->has('message'))
    <div class="mb-4 text-green-600 font-semibold">
        {{ session('message') }}
    </div>
    @endif

   
    <form wire:submit.prevent="save" class=" grid grid-cols-2 gap-4">
        <!-- Lead Owner -->

        <div>
            <label for="lead_owner" class="block text-sm font-medium text-gray-700">Lead Owner</label>
            <input
                type="text"
                id="lead_owner"
                wire:model="lead_owner"
                class="mt-1 block w-full rounded-md border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter lead owner">
            @error('lead_owner') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- First Name -->
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input
                type="text"
                id="first_name"
                wire:model="first_name"
                class="mt-1 block w-full rounded-md border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
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
                class="mt-1 block w-full rounded-md border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter last name">
            @error('last_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input
                type="text"
                id="title"
                wire:model="title"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter title">
            @error('title') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Repeat similar blocks for all other fields -->
        @foreach ([
        'company' => 'Company',
        'phone' => 'Phone',
        'email' => 'Email',
        'website' => 'Website',
        'lead_source' => 'Lead Source',
        'lead_status' => 'Lead Status',
        'industry' => 'Industry',
        'annual_revenue' => 'Annual Revenue',
        'no_of_employees' => 'Number of Employees',
        'rating' => 'Rating',
        'street' => 'Street',
        'city' => 'City',
        'state' => 'State',
        'zip_code' => 'Zip Code',
        'country' => 'Country',
        'description'=>'description'
        ] as $field => $label)
        <div>
            <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
            <input
                type="text"
                id="{{ $field }}"
                wire:model="{{ $field }}"
                class="mt-1 block w-full rounded-md border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter {{ strtolower($label) }}">
            @error($field) <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        @endforeach

        <!-- Submit Button -->
        <div>
        <button type="submit">{{ $lead_id ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>