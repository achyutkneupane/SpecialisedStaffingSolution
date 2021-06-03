<div class="flex flex-col items-center justify-center h-screen">
    <div class="loading" wire:loading></div>
    <div class="w-6/12 p-5 mt-10 text-center bg-white rounded-lg shadow">
        <div class="w-full m-3 text-3xl text-center text-blue-800">
            Book A Job
        </div>
        <div class="w-full">
            @if(session()->has('JobSaved'))
            <div class="py-2 my-2 text-center text-gray-600 bg-green-200 border border-green-800 rounded-xl">
                {!! session('JobSaved') !!}
            </div>
            @endif
            <div class="flex flex-col">
                <div class="mt-4">
                    <input wire:model.lazy="jobTitle" placeholder="Enter Job Title" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                @error('jobTitle')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                <div class="flex mt-4">
                    <div class="relative w-full text-blue-600 focus-within:text-gray-400">
                        <input wire:model.lazy="jobDate" placeholder="Click on the Calender to enter start date" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" readonly>
                        <span class="absolute inset-y-0 flex items-center pl-2 right-4">
                            <button
                                x-data="{ value : @entangle('jobDate'), picker: undefined }"
                                x-ref="value"
                                x-init="new Pikaday({ field: $refs.value, format: 'DD-MM-YYYY' })"
                                x-on:change="value = $event.target.value"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
                @error('jobDate')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                <div class="flex mt-4">
                    <div class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        <div class="flex">
                          <select wire:model="hours" class="mr-3 text-center bg-transparent outline-none appearance-none">
                            <option value="" disabled selected>HH</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                          <span class="mr-3">:</span>
                          <select wire:model="minutes" class="mr-4 bg-transparent outline-none appearance-none">
                            <option value="" disabled selected>MM</option>
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                          </select>
                          <select wire:model="ampm" class="bg-transparent outline-none appearance-none">
                            <option value="" disabled selected>AM/PM</option>
                            <option value="am">AM</option>
                            <option value="pm">PM</option>
                          </select>
                        </div>
                    </div>
                </div>
                @error('hours')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                @error('minutes')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                @error('ampm')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                <div class="mt-4">
                    <select wire:model.lazy="jobPriority" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        <option value="" disabled>Select an Option</option>
                        <option value="2">High</option>
                        <option value="1">Medium</option>
                        <option value="0">Low</option>
                    </select>
                </div>
                @error('jobPriority')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                <div class="mt-4">
                    <input wire:model.lazy="jobLocation" placeholder="Enter Job Location" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                @error('jobLocation')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                <div class="mt-4">
                    <input wire:model.lazy="jobBudget" placeholder="Enter Job Budget" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                </div>
                @error('jobBudget')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                <div class="mt-4">
                    <textarea wire:model.lazy="jobDescription" placeholder="Enter Job Description" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"></textarea>
                </div>
                @error('jobDescription')
                    <span class="text-left text-red-700">{{ $message }}</span>
                @enderror
                <button type="submit" wire:click="store" class="block w-3/12 px-4 py-3 mt-6 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-800 rounded-lg hover:bg-indigo-800 hover:text-blue-100 hover:to-black focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 ">Store</button>
            </div>
        </div>
    </div>
</div>