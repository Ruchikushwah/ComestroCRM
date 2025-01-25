<div class=" w-full">
    <div class="flex justify-between mb-4">
        <input
            type="text"
            placeholder="Search..."
            class="border px-4 py-2 rounded"
            wire:model.debounce.500ms="search" />
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        lead_owner
                    </th>
                    <th scope="col" class="px-6 py-3">
                        first name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leads as $lead)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $lead->lead_owner }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $lead->first_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lead->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lead->phone }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-teal-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center">No Leads Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $leads->links() }}
    </div>
</div>