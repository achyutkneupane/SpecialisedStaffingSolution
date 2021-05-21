<div class="flex flex-col h-screen items-center justify-center">
    <div class="text-center w-9/12">
        <div class="flex items-center">
            <div class='overflow-x-auto w-full'>
                <h1 class="text-4xl font-bolder pb-4">All Employees</h1>
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
                                Jobs Assigned
                            </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
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
                                <p class="p-1 rounded-xl bg-yellow-600 text-white">
                                    Blocked
                                </p>
                                @elseif($employee->works->where('status','active')->count() == 0)
                                <p class="p-1 rounded-xl bg-green-800 text-white">
                                    Available
                                </p>
                                @else
                                <p class="p-1 rounded-xl bg-red-800 text-white">
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
