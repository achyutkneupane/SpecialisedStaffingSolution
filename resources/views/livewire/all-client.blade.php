<div class="flex flex-col items-center justify-center h-screen">
    <div class="loading" wire:loading></div>
    <div class="w-9/12 text-center">
        <div class="flex items-center">
            <div class='w-full overflow-x-auto'>
                <h1 class="pb-4 text-4xl font-bolder">All Clients</h1>
                <table class='w-full max-w-4xl mx-auto mb-3 overflow-hidden bg-white divide-y divide-gray-300 rounded-lg whitespace-nowrap'>
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-600">
                            <th class="px-6 py-4 text-sm font-semibold text-center uppercase">
                                Name
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-center uppercase">
                                Email
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-center uppercase">
                                Jobs Created
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($clients as $client)
                        <tr class="cursor-pointer" wire:click='viewClient({{ $client->id }})'>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    {{ $client->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="">
                                    {{ $client->email }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <p class="">
                                    {{ $client->jobs->count() }}
                                </p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $clients->links() }}
            </div>
        </div>
    </div>
</div>
