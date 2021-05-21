<div class="flex flex-col h-screen items-center justify-center">
    <div class="text-center w-9/12">
        <div class="flex items-center">
            <div class='overflow-x-auto w-full'>
                <h1 class="text-4xl font-bolder pb-4">All Customers</h1>
                <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden mb-3'>
                    <thead class="bg-gray-50">
                        <tr class="text-gray-600 text-left">
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                Name
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                Email
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                Jobs Created
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($customers as $customer)
                        <tr class="cursor-pointer" wire:click='viewCustomer({{ $customer->id }})'>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    {{ $customer->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="">
                                    {{ $customer->email }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <p class="">
                                    {{ $customer->jobs->count() }}
                                </p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>
