<form wire:submit.prevent="submit" class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Create Vendor</h2>

    <!-- Vendor Owner -->
    <div class="mb-4">
        <label for="vendor_owner" class="block text-sm font-medium text-gray-700">Vendor Owner</label>
        <input type="text" id="vendor_owner" wire:model="vendor_owner" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @error('vendor_owner') 
            <span class="text-red-600 text-sm">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Vendor Name -->
    <div class="mb-4">
        <label for="vendor_name" class="block text-sm font-medium text-gray-700">Vendor Name</label>
        <input type="text" id="vendor_name" wire:model="vendor_name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @error('vendor_name') 
            <span class="text-red-600 text-sm">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Phone -->
    <div class="mb-4">
        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
        <input type="text" id="phone" wire:model="phone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @error('phone') 
            <span class="text-red-600 text-sm">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" wire:model="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @error('email') 
            <span class="text-red-600 text-sm">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Website -->
    <div class="mb-4">
        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
        <input type="url" id="website" wire:model="website" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @error('website') 
            <span class="text-red-600 text-sm">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Category -->
    <div class="mb-4">
        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
        <input type="text" id="category" wire:model="category" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @error('category') 
            <span class="text-red-600 text-sm">{{ $message }}</span> 
        @enderror
    </div>

    <!-- GL Account -->
    <div class="mb-4">
        <label for="gl_account" class="block text-sm font-medium text-gray-700">GL Account</label>
        <input type="text" id="gl_account" wire:model="gl_account" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @error('gl_account') 
            <span class="text-red-600 text-sm">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" wire:model="description" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        @error('description') 
            <span class="text-red-600 text-sm">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end">
        <button type="submit" class="mt-4 px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
            Create Vendor
        </button>
    </div>
</form>
