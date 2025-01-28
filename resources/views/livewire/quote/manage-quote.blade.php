<div>
    <div class="w-full">
        <!-- Search Bar -->
        <div class="flex justify-between mb-4">
            <input type="text" placeholder="Search..." class="border px-4 py-2 rounded"
                wire:model.debounce.500ms="search" />
        </div>

        <!-- Table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Subject</th>
                        <th scope="col" class="px-6 py-3">Quote Stage</th>
                        <th scope="col" class="px-6 py-3">Team</th>
                        <th scope="col" class="px-6 py-3">Carrier</th>
                        <th scope="col" class="px-6 py-3">Deal Name</th>
                        <th scope="col" class="px-6 py-3">Valid Until</th>
                        <th scope="col" class="px-6 py-3">Contact Name</th>
                        <th scope="col" class="px-6 py-3">Account Name</th>
                        <th scope="col" class="px-6 py-3">Billing Address</th>
                        <th scope="col" class="px-6 py-3">Shipping Address</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($quotes as $quote)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $quote->subject }}
                            </th>
                            <td class="px-6 py-4">{{ $quote->quote_stage }}</td>
                            <td class="px-6 py-4">{{ $quote->team }}</td>
                            <td class="px-6 py-4">{{ $quote->carrier }}</td>
                            <td class="px-6 py-4">{{ $quote->deal_name }}</td>
                            <td class="px-6 py-4">{{ $quote->valid_until }}</td>
                            <td class="px-6 py-4">{{ $quote->contact_name }}</td>
                            <td class="px-6 py-4">{{ $quote->account_name }}</td>
                            <td class="px-6 py-4">
                                {{ $quote->billing_street }}, {{ $quote->billing_city }}, {{ $quote->billing_state }},
                                {{ $quote->billing_code }}, {{ $quote->billing_country }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $quote->shipping_street }}, {{ $quote->shipping_city }},
                                {{ $quote->shipping_state }},
                                {{ $quote->shipping_code }}, {{ $quote->shipping_country }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('create-quote.edit', $quote->id) }}" wire:navigate
                                    class="font-medium text-teal-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="border px-4 py-2 text-center">No Quotes Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
