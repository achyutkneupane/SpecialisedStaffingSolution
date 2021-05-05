<div class="flex flex-col items-center justify-center">
    <div class="text-center bg-white shadow w-6/12 rounded-lg p-5 mt-10">
        <div class="w-full text-3xl m-3 text-center">
            Book A Job
        </div>
        <div class="w-full">
            @if(session()->has('JobSaved'))
            <div class="my-2 border border-green-800 bg-green-200 text-gray-600 rounded-xl py-2 text-center">
                {!! session('JobSaved') !!}
            </div>
            @endif
            <div class="flex flex-col">
                <div class="mt-4">
                    <input wire:model.lazy="jobTitle" placeholder="Enter Job Title" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                @error('jobTitle')
                    <span class="text-red-700 text-left">{{ $message }}</span>
                @enderror
                <div class="flex mt-4">
                    <div class="w-full relative text-gray-600 focus-within:text-gray-400">
                        <input wire:model.lazy="jobDate" placeholder="Click on the Calender to enter date" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" readonly>
                        <span class="absolute inset-y-0 right-4 flex items-center pl-2">
                            <button
                                x-data="{ value : @entangle('jobDate'), picker: undefined }"
                                x-ref="value"
                                x-init="new Pikaday({ field: $refs.value, format: 'DD-MM-YYYY' })"
                                x-on:change="value = $event.target.value"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
                @error('jobDate')
                    <span class="text-red-700 text-left">{{ $message }}</span>
                @enderror
                <button type="submit" wire:click="store" class="block w-3/12 px-4 py-3 mt-6 font-semibold text-white transition duration-500 ease-in-out transform bg-black rounded-lg hover:bg-gray-800 hover:to-black focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Store</button>
            </div>
        </div>
    </div>
    @foreach(json_decode($jobs) as $job)
    <div class="bg-white shadow w-9/12 rounded-lg p-5 mt-2 mb-3">
        <div class="flex justify-around">
            <div class="flex flex-col text-center">
                <div class="text-xl font-extrabold">Title: </div>
                <div class="text-xl">{{ $job->title }}</div>
            </div>
            <div class="flex flex-col text-center">
                <div class="text-xl font-extrabold">Created By: </div>
                <div class="text-xl">{{ $job->user->name }}</div>
            </div>
            <div class="flex flex-col text-center">
                <div class="text-xl font-extrabold">Date of Appointment: </div>
                <div class="text-xl">{{ $job->job_date }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>