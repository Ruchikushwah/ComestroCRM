
@extends('crm.layout')
@section('content')
<div class="w-full mx-auto p-6 bg-gray-200 shadow-md rounded-md">
    @if (session()->has('message'))
        <div class="mb-2 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class=" w-full  p-4 bg-white shadow-md rounded-lg grid grid-cols-2 gap-5">
        <div class="mb-2">
            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
            <input type="text" id="subject" wire:model="subject"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('subject')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="quote_stage" class="block text-sm font-medium text-gray-700">Quote Stage</label>
            <input type="text" id="quote_stage" wire:model="quote_stage"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('quote_stage')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="team" class="block text-sm font-medium text-gray-700">Team</label>
            <input type="text" id="team" wire:model="team"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('team')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="carrier" class="block text-sm font-medium text-gray-700">Carrier</label>
            <input type="text" id="carrier" wire:model="carrier"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('carrier')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-2">
            <label for="deal_name" class="block text-sm font-medium text-gray-700">Deal Name</label>
            <input type="text" id="deal_name" wire:model="deal_name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('deal_name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="valid_until" class="block text-sm font-medium text-gray-700">Valid Until</label>
            <input type="text" id="valid_until" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter valid_until">
            @error('valid_until')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact Name</label>
            <input type="text" id="contact_name" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter contact_name">
            @error('contact_name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
            <input type="text" id="account_name" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter account_name">
            @error('account_name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="billing_street" class="block text-sm font-medium text-gray-700">Billing Street</label>
            <input type="text" id="billing_street" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter billing_street">
            @error('billing_street')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="billing_city" class="block text-sm font-medium text-gray-700">Billing City</label>
            <input type="text" id="billing_city" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter billing_city">
            @error('billing_city')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="billing_state" class="block text-sm font-medium text-gray-700">Billing State</label>
            <input type="text" id="billing_state" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter billing_state">
            @error('billing_state')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="billing_code" class="block text-sm font-medium text-gray-700"> Billing_code</label>
            <input type="text" id="billing_code" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter billing_code">
            @error('billing_code')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="billing_country" class="block text-sm font-medium text-gray-700"> Billing Country</label>
            <input type="text" id="billing_country" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter billing_country">
            @error('billing_country')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="shipping_street" class="block text-sm font-medium text-gray-700"> Shipping Street</label>
            <input type="text" id="shipping_street" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter shipping_street">
            @error('shipping_street')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="shipping_city" class="block text-sm font-medium text-gray-700"> Shipping City</label>
            <input type="text" id="shipping_city" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter shipping_city">
            @error('shipping_city')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="shipping_state" class="block text-sm font-medium text-gray-700"> Shipping State</label>
            <input type="text" id="shipping_state" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter shipping_state">
            @error('shipping_state')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="shipping_code" class="block text-sm font-medium text-gray-700"> Shipping Code</label>
            <input type="text" id="shipping_code" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter shipping_code">
            @error('shipping_code')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="shipping_country" class="block text-sm font-medium text-gray-700"> Shipping country</label>
            <input type="text" id="shipping_country" wire:model="valid_until"
                class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-4 py-2 bg-white"
                placeholder="Enter shipping_country">
            @error('shipping_country')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit"
                class="bg-teal-500 hover:bg-teal-800 text-white px-4 py-2 rounded-lg ">{{ $quote_id ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>
@endsection