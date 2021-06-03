<div class="flex flex-col items-center justify-center h-screen">
    <div class="loading" wire:loading></div>
    <div class="w-9/12 text-center">
        <div class="flex items-center">
            <div class='w-full overflow-x-auto'>
                <h1 class="pb-4 text-4xl font-bolder">All Employees</h1>
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
                                Jobs Assigned
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-center uppercase">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($employees as $employee)
                        <tr class="cursor-pointer" wire:click='viewEmployee({{ $employee->id }})'>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    {{ $employee->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="">
                                    {{ $employee->email }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <p class="">
                                    {{ $employee->works->count() }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($employee->blocked)
                                <p class="p-1 text-white bg-yellow-600 rounded-xl">
                                    Blocked
                                </p>
                                @elseif($employee->works->where('status','active')->count() == 0)
                                <p class="p-1 text-white bg-green-800 rounded-xl">
                                    Available
                                </p>
                                @else
                                <p class="p-1 text-white bg-red-800 rounded-xl">
                                    Not Available
                                </p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
