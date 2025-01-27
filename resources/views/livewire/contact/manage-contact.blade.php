<div class=" w-full">
    <div class="flex justify-between mb-4">
        <input
            type="text"
            placeholder="Search..."
            class="border px-4 py-2 rounded" />
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        First Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Account Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mobile
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $contact->first_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $contact->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $contact->account_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $contact->mobile }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('create-contact.edit', $contact->id)}}"    wire:navigate class="font-medium text-teal-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center">No Contacts Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>