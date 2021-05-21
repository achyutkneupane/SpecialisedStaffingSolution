<div class="h-screen w-full">
    <div class="w-full rounded-lg p-5 flex flex-wrap justify-center">
        <div class="bg-white shadow w-9/12 rounded-lg p-5">
            <div class="flex flex-col justify-around w-full">
                <div class="flex">
                    <div class="text-4xl font-bolder pb-4 w-11/12">View Job</div>
                    @if($job->user == auth()->user() && $job->status != 'closed')
                    <div class="w-1/12 py-4 rounded-xl cursor-pointer bg-red-800 text-white text-center mx-1" wire:click='cancelBooking'>Cancel</div>
                    @endif
                    @if($job->worker == auth()->user() && $job->status != 'completed')
                    <div class="w-1/12 py-4 rounded-xl cursor-pointer bg-red-800 text-white text-center mx-1" wire:click='cancelJob'>Cancel</div>
                    @endif
                    @isManager
                    @if(empty($job->worker))
                        @if($showInput)
                        <select wire:model="employee" class="p-3 mr-5 border-2 rounded-lg">
                            <option value="" disabled>Select an employee</option>
                            @foreach($workers as $worker)
                                <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                            @endforeach
                        </select>
                        @endif
                        <button
                        class="p-3 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-800 rounded-lg hover:bg-indigo-800 hover:text-blue-100 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2" @if($showInput) wire:click="assign" @else wire:click="$toggle('showInput')" @endif>
                            Assign
                        </button>
                        @error('employee')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    @else
                        @if($showInput)
                        <select wire:model="employee" class="p-3 mr-5 border-2 rounded-lg">
                            <option value="" disabled>Select an employee</option>
                            @foreach($workers as $worker)
                                <option value="{{ $worker->id }}" {{ ($job->worker->id == $worker->id || $worker->blocked == true) ? 'disabled' : '' }}>{{ $worker->name }}</option>
                            @endforeach
                        </select>
                        @endif
                        <button
                        class="p-3 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-800 rounded-lg hover:bg-indigo-800 hover:text-blue-100 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2" @if($showInput) wire:click="assign" @else wire:click="$toggle('showInput')" @endif>
                            Re Assign
                        </button>
                        @error('employee')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    @endif
                    @endisManager
                </div>
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Title: </div>
                    <div class="text-xl w-9/12">{{ $job->title }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Created By: </div>
                    <div class="text-xl w-9/12">{{ $job->user->name }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Date of Appointment: </div>
                    <div class="text-xl w-9/12">{{ $job->job_startDateTime }}</div>
                </div>
                @if(!empty($job->worker))
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Assigned To: </div>
                    <div class="text-xl w-9/12">{{ $job->worker->name }}</div>
                </div>
                @endif
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Job Description: </div>
                    <div class="text-xl w-9/12">{{ $job->job_description }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Job Status: </div>
                    <div class="text-xl w-9/12">{{ ucwords($job->status) }}</div>
                </div>
                @if (($job->user == auth()->user() && $job->status == 'completed'))
                <form wire:submit.prevent="addReview">
                    <div class="flex flex-row w-full">
                        <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Review: </div>
                        @if($job->review)
                        <div class="text-xl w-9/12">{{ $job->review->review }}</div>
                        @else
                        <div class="w-9/12">
                            <textarea class="w-full border shadow p-3" wire:model="review" placeholder="Enter any review for the worker....."></textarea>
                            @error('review')
                                <div class="w-full text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-row w-full">
                        <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Rating: </div>
                        @if($job->review)
                        <div class="text-xl w-9/12"><b>{{ $job->review->rating }}</b>/5</div>
                        @else
                        <div class="w-9/12">
                        <select wire:model="rating" class="border-2 p-2 rounded-lg w-3/12">
                            <option value='' selected disabled>Select Rating</option>
                            <option value='1'>1/5</option>
                            <option value='2'>2/5</option>
                            <option value='3'>3/5</option>
                            <option value='4'>4/5</option>
                            <option value='5'>5/5</option>
                        </select>
                        @error('rating')
                        <br>
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                        </div>
                        @endif
                    </div>
                    @if(!$job->review)
                    <div class="flex flex-row w-full">
                        <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12"></div>
                        <button class="w-1/12 py-2 my-2 rounded-xl cursor-pointer bg-blue-800 text-white text-center mx-1">Submit</button>
                    </div>
                    @endif
                </form>
                @endif
                @if (($job->worker == auth()->user() || auth()->user()->role == 'manager') && $job->status == 'completed' && $job->review)
                    <div class="flex flex-row w-full">
                        <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Review: </div>
                        <div class="text-xl w-9/12">{{ $job->review->review }}</div>
                    </div>
                    <div class="flex flex-row w-full">
                        <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Rating: </div>
                        <div class="text-xl w-9/12"><b>{{ $job->review->rating }}</b>/5</div>
                    </div>
                @endif
                @if($job->status == 'completed')
                    <div class="flex flex-col mt-5">
                        <div class="text-2xl font-bolder pb-4 w-full">Remark by Employee</div>
                        @if($job->remark()->count() > 0)
                        <div class="flex flex-col justify-center items-center">
                            <div class="w-7/12 my-2 border p-2">
                                <div class="text-xl w-full text-black">{{ $job->remark->remark }}</div>
                                <div class="text-sm w-full text-gray-400">{{ $job->remark->created_at }}</div>
                            </div>
                        </div>
                        @else
                        @if($job->worker == auth()->user())
                        <div class="flex flex-row w-full">
                            <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Add Remark: </div>
                            <div class="w-9/12">
                                <form wire:submit.prevent='submitRemark'>
                                    <textarea class="w-full border shadow p-3" wire:model="remark" placeholder="Enter a remark for the employee....."></textarea>
                                    @error('remark')
                                        <div class="w-full text-red-600">{{ $message }}</div>
                                    @enderror
                                    <button class="w-1/12 py-2 my-2 rounded-xl cursor-pointer bg-blue-800 text-white text-center mx-1">Submit</button>
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="w-full my-2 border p-2">
                            <div class="text-xl w-full text-center text-gray-500">Currently there is no remark</div>
                        </div>
                        @endif
                        @endif
                    </div>
                @endif
                <div class="flex flex-col mt-5">
                    <div class="text-2xl font-bolder pb-4 w-full">Notes by Customer</div>
                    @if($job->user == auth()->user() && $job->status != 'completed')
                    <div class="flex flex-row w-full">
                        <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">New Note: </div>
                        <div class="w-9/12">
                            <form wire:submit.prevent='submitNote'>
                                <textarea class="w-full border shadow p-3" wire:model="note" placeholder="Enter the note for the worker....."></textarea>
                                @error('note')
                                    <div class="w-full text-red-600">{{ $message }}</div>
                                @enderror
                                <button class="w-1/12 py-2 my-2 rounded-xl cursor-pointer bg-blue-800 text-white text-center mx-1">Submit</button>
                            </form>
                        </div>
                    </div>
                    @endif
                    @if($job->notes->count() > 0)
                    @foreach($job->notes as $note)
                    <div class="flex flex-col justify-center items-center">
                        <div class="w-7/12 my-2 border p-2">
                            <div class="text-xl w-full text-black">{{ $note->note }}</div>
                            <div class="text-sm w-full text-gray-400">{{ $note->created_at }}</div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="w-full my-2 border p-2">
                        <div class="text-xl w-full text-center text-gray-500">Currently there are no notes</div>
                    </div>
                    @endif
                </div>
                <div class="flex flex-col mt-5">
                    <div class="text-2xl font-bolder pb-4 w-full">Milestones</div>
                    @if($job->worker == auth()->user())
                    <div class="flex flex-row w-full">
                        <div class="text-xl font-extrabold text-blue-900 mr-5 w-3/12">Add Milestone: </div>
                        <div class="w-9/12">
                            <div class="w-full flex flex-wrap">
                                <div class="flex flex-col w-full my-1">
                                    <div class="w-full relative text-blue-600 focus-within:text-gray-400">
                                        <input wire:model.lazy="startJobDate" placeholder="Click on the Calender to enter start date" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" readonly>
                                        <span class="absolute inset-y-0 right-4 flex items-center pl-2">
                                            <button
                                                x-data="{ value : @entangle('startJobDate'), picker: undefined }"
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
                                    @error('startJobDate')
                                        <span class="text-red-700 text-left">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-full my-1">
                                    <div class="w-full relative text-blue-600 focus-within:text-gray-400">
                                        <input wire:model.lazy="endJobDate" placeholder="Click on the Calender to enter end date" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" readonly>
                                        <span class="absolute inset-y-0 right-4 flex items-center pl-2">
                                            <button
                                                x-data="{ value : @entangle('endJobDate'), picker: undefined }"
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
                                    @error('endJobDate')
                                        <span class="text-red-700 text-left">{{ $message }}</span>
                                    @enderror
                                </div>
                                @error('remark')
                                    <div class="w-full text-red-600">{{ $message }}</div>
                                @enderror
                                <div class="flex flex-col w-full my-1">
                                    <div>
                                    <input wire:model.lazy="milestoneText" placeholder="Enter milestone detail" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                                    </div>
                                    @error('milestoneText')
                                        <div class="text-red-700 text-left w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                                @error('remark')
                                    <div class="w-full text-red-600">{{ $message }}</div>
                                @enderror
                                <button wire:click="addMilestone" class="w-1/12 py-2 my-2 rounded-xl cursor-pointer bg-blue-800 text-white text-center mx-1">Submit</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($job->milestones()->count() > 0)
                    <div class="flex flex-col justify-center items-center">
                        @foreach($job->milestones as $milestone)
                        <div class="w-7/12 my-2 border p-2">
                            @if(empty($milestone->completed_at))
                            <a class="text-blue-700 cursor-pointer" wire:click='completeMilestone({{ $milestone->id }})'>Complete</a>
                            @else
                            <div class="text-green-400 font-bold">Completed</div>
                            @endif
                            <div class="text-xl w-full text-black">{{ $milestone->text }}</div>
                            <div class="text-sm w-full text-gray-400">{{ $milestone->startDate }} to {{ $milestone->endDate }}</div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="w-full my-2 border p-2">
                        <div class="text-xl w-full text-center text-gray-500">No milestones</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
