<div class="w-full h-screen">
    <div class="loading" wire:loading></div>
    <div class="flex flex-wrap justify-center w-full p-5 rounded-lg">
        <div class="w-9/12 p-5 bg-white rounded-lg shadow">
            <div class="flex flex-col justify-around w-full">
                <div class="flex">
                    <div class="w-11/12 pb-4 text-4xl font-bolder">View Job</div>
                    @if($job->status != 'closed')
                    @if($job->user == auth()->user() && ($job->status != 'closed' && $job->status != 'completed'))
                    <div class="w-1/12 py-4 mx-1 text-center text-white bg-red-800 cursor-pointer rounded-xl" wire:click='cancelBooking'>Cancel</div>
                    @endif
                    @if($job->worker == auth()->user() && $job->status != 'completed')
                    <div class="w-1/12 py-4 mx-1 text-center text-white bg-red-800 cursor-pointer rounded-xl" wire:click='cancelJob'>Cancel</div>
                    @endif
                    @isManager
                    @if(empty($job->worker))
                        @if($showInput)
                        <select wire:model="employee" class="p-3 mr-5 border-2 rounded-lg">
                            <option value="" disabled>Select an employee</option>
                            @foreach($workers as $worker)
                                <option value="{{ $worker->id }}" {{ $worker->blocked == true || $worker->works->where('status','active')->count() != 0 || $worker->worker_work_days->contains(Carbon\Carbon::parse($job->job_startDateTime)->format('Y-m-d')) ? 'disabled' : '' }}>{{ $worker->name }}</option>
                            @endforeach
                        </select>
                        @endif
                        @if($job->status != 'completed' && $job->status != 'closed')
                        <button
                        class="p-3 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-800 rounded-lg hover:bg-indigo-800 hover:text-blue-100 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2" @if($showInput) wire:click="assign" @else wire:click="$toggle('showInput')" @endif>
                            Assign
                        </button>
                        @endif
                        @error('employee')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    @else
                    @if($job->status != 'completed')
                        @if($showInput)
                        <select wire:model="employee" class="p-3 mr-5 border-2 rounded-lg">
                            <option value="" disabled>Select an employee</option>
                            @foreach($workers as $worker)
                                <option value="{{ $worker->id }}" {{ $job->worker->id == $worker->id || $worker->blocked == true || $worker->works->where('status','active')->count() != 0 || $worker->worker_work_days->contains(Carbon\Carbon::parse($job->job_startDateTime)->format('Y-m-d')) ? 'disabled' : '' }}>{{ $worker->name }}</option>
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
                    @endif
                    @endisManager
                    @endif
                    @if($job->status == 'completed')
                    <a class="w-2/12 py-4 mx-1 text-center text-white bg-blue-800 cursor-pointer rounded-xl" href="{{ route('viewInvoice',$job->id) }}">View Invoice</a>
                    @endif
                </div>
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Title: </div>
                    <div class="w-9/12 text-xl">{{ $job->title }}
                        @isManager
                        @if($job->status != 'closed')
                        <a class="font-bold text-red-700 cursor-pointer" wire:click="managerCancel">(Cancel)</a>
                        @endif
                        @endisManager
                    </div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Created By: </div>
                    <div class="w-9/12 text-xl">{{ $job->user->name }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Date of Appointment: </div>
                    <div class="w-9/12 text-xl">{{ $job->job_startDateTime }}</div>
                </div>
                @if(!empty($job->worker))
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Assigned To: </div>
                    <div class="w-9/12 text-xl">{{ $job->worker->name }}</div>
                </div>
                @endif
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Job Location: </div>
                    <div class="w-9/12 text-xl">{{ $job->location }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Job Description: </div>
                    <div class="w-9/12 text-xl">{{ $job->job_description }}</div>
                </div>
                <div class="flex flex-row w-full">
                    <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Job Status: </div>
                    <div class="w-9/12 text-xl">
                        @if(!$statusChangerFlag)
                        {{ ucwords($job->status) }}
                        @isEmployeeOrManager
                        @if($job->status != 'closed')
                        <a class="font-bold text-green-700 cursor-pointer" wire:click="changeStatus">(Change Status)</a>
                        @endif
                        @endisEmployeeOrManager
                        @else
                        @isEmployeeOrManager
                        <select wire:model="jobStatus" class="p-2 border rounded-xl">
                            <option value="" disabled>Select an Option</option>
                            <option value="active">Active</option>
                            @isManager
                            <option value="proposed">Proposed</option>
                            <option value="completed">Completed</option>
                            <option value="closed">Closed</option>
                            @endisManager
                            <option value="inactive">Inactive</option>
                        </select>
                        @endisEmployeeOrManager
                        @endif
                    </div>
                </div>
                @if (($job->user == auth()->user() && $job->status == 'completed'))
                <form wire:submit.prevent="addReview">
                    <div class="flex flex-row w-full">
                        <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Review: </div>
                        @if($job->review)
                        <div class="w-9/12 text-xl">{{ $job->review->review }}</div>
                        @else
                        <div class="w-9/12">
                            <textarea class="w-full p-3 border shadow" wire:model="review" placeholder="Enter any review for the worker....."></textarea>
                            @error('review')
                                <div class="w-full text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-row w-full">
                        <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Rating: </div>
                        @if($job->review)
                        <div class="w-9/12 text-xl"><b>{{ $job->review->rating }}</b>/5</div>
                        @else
                        <div class="w-9/12">
                        <select wire:model="rating" class="w-3/12 p-2 border-2 rounded-lg">
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
                        <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900"></div>
                        <button class="w-1/12 py-2 mx-1 my-2 text-center text-white bg-blue-800 cursor-pointer rounded-xl">Submit</button>
                    </div>
                    @endif
                </form>
                @endif
                @if (($job->worker == auth()->user() || auth()->user()->role == 'manager') && $job->status == 'completed' && $job->review)
                    <div class="flex flex-row w-full">
                        <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Review: </div>
                        <div class="w-9/12 text-xl">{{ $job->review->review }}</div>
                    </div>
                    <div class="flex flex-row w-full">
                        <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Rating: </div>
                        <div class="w-9/12 text-xl"><b>{{ $job->review->rating }}</b>/5</div>
                    </div>
                @endif
                @if($job->status == 'completed')
                    <div class="flex flex-col mt-5">
                        <div class="w-full pb-4 text-2xl font-bolder">Remark by Employee</div>
                        @if($job->remark()->count() > 0)
                        <div class="flex flex-col items-center justify-center">
                            <div class="w-7/12 p-2 my-2 border">
                                <div class="w-full text-xl text-black">{{ $job->remark->remark }}</div>
                                <div class="w-full text-sm text-gray-400">{{ $job->remark->created_at }}</div>
                            </div>
                        </div>
                        @else
                        @if($job->worker == auth()->user())
                        <div class="flex flex-row w-full">
                            <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Add Remark: </div>
                            <div class="w-9/12">
                                <form wire:submit.prevent='submitRemark'>
                                    <textarea class="w-full p-3 border shadow" wire:model="remark" placeholder="Enter a remark for the employee....."></textarea>
                                    @error('remark')
                                        <div class="w-full text-red-600">{{ $message }}</div>
                                    @enderror
                                    <button class="w-1/12 py-2 mx-1 my-2 text-center text-white bg-blue-800 cursor-pointer rounded-xl">Submit</button>
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="w-full p-2 my-2 border">
                            <div class="w-full text-xl text-center text-gray-500">Currently there is no remark</div>
                        </div>
                        @endif
                        @endif
                    </div>
                @endif
                <div class="flex flex-col mt-5">
                    <div class="w-full pb-4 text-2xl font-bolder">Notes by Customer</div>
                    @if($job->user == auth()->user() && $job->status != 'completed')
                    <div class="flex flex-row w-full">
                        <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">New Note: </div>
                        <div class="w-9/12">
                            <form wire:submit.prevent='submitNote'>
                                <textarea class="w-full p-3 border shadow" wire:model="note" placeholder="Enter the note for the worker....."></textarea>
                                @error('note')
                                    <div class="w-full text-red-600">{{ $message }}</div>
                                @enderror
                                <button class="w-1/12 py-2 mx-1 my-2 text-center text-white bg-blue-800 cursor-pointer rounded-xl">Submit</button>
                            </form>
                        </div>
                    </div>
                    @endif
                    @if($job->notes->count() > 0)
                    @foreach($job->notes as $note)
                    <div class="flex flex-col items-center justify-center">
                        <div class="w-7/12 p-2 my-2 border">
                            <div class="w-full text-xl text-black">{{ $note->note }}</div>
                            <div class="w-full text-sm text-gray-400">{{ $note->created_at }}</div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="w-full p-2 my-2 border">
                        <div class="w-full text-xl text-center text-gray-500">Currently there are no notes</div>
                    </div>
                    @endif
                </div>
                <div class="flex flex-col mt-5">
                    <div class="w-full pb-4 text-2xl font-bolder">Milestones</div>
                    @if($job->worker == auth()->user())
                    <div class="flex flex-row w-full">
                        <div class="w-3/12 mr-5 text-xl font-extrabold text-blue-900">Add Milestone: </div>
                        <div class="w-9/12">
                            <div class="flex flex-wrap w-full">
                                <div class="flex flex-col w-full my-1">
                                    <div class="relative w-full text-blue-600 focus-within:text-gray-400">
                                        <input wire:model.lazy="startJobDate" placeholder="Click on the Calender to enter start date" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" readonly>
                                        <span class="absolute inset-y-0 flex items-center pl-2 right-4">
                                            <button
                                                x-data="{ value : @entangle('startJobDate'), picker: undefined }"
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
                                    @error('startJobDate')
                                        <span class="text-left text-red-700">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-full my-1">
                                    <div class="relative w-full text-blue-600 focus-within:text-gray-400">
                                        <input wire:model.lazy="endJobDate" placeholder="Click on the Calender to enter end date" class="w-full px-4 py-2 text-base text-black transition duration-500 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" readonly>
                                        <span class="absolute inset-y-0 flex items-center pl-2 right-4">
                                            <button
                                                x-data="{ value : @entangle('endJobDate'), picker: undefined }"
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
                                    @error('endJobDate')
                                        <span class="text-left text-red-700">{{ $message }}</span>
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
                                        <div class="w-full text-left text-red-700">{{ $message }}</div>
                                    @enderror
                                </div>
                                @error('remark')
                                    <div class="w-full text-red-600">{{ $message }}</div>
                                @enderror
                                <button wire:click="addMilestone" class="w-1/12 py-2 mx-1 my-2 text-center text-white bg-blue-800 cursor-pointer rounded-xl">Submit</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($job->milestones()->count() > 0)
                    <div class="flex flex-col items-center justify-center">
                        @foreach($job->milestones as $milestone)
                        <div class="w-7/12 p-2 my-2 border">
                            @if(empty($milestone->completed_at))
                            <a class="text-blue-700 cursor-pointer" wire:click='completeMilestone({{ $milestone->id }})'>Complete</a>
                            @else
                            <div class="font-bold text-green-400">Completed</div>
                            @endif
                            <div class="w-full text-xl text-black">{{ $milestone->text }}</div>
                            <div class="w-full text-sm text-gray-400">{{ $milestone->startDate }} to {{ $milestone->endDate }}</div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="w-full p-2 my-2 border">
                        <div class="w-full text-xl text-center text-gray-500">No milestones</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
