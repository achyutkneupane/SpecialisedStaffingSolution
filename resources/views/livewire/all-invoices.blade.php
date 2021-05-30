<div class="w-full h-screen">
    @if($jobs->count() > 0)
    <div class="flex flex-wrap justify-center w-full rounded-lg">
        @foreach($jobs as $job)
        <a class="w-3/4 p-5 mt-2 mb-3 bg-white border-4
        @if($job->priority == '2')
        border-red-700
        @elseif($job->priority == '1')
        border-yellow-400
        @else
        border-green-700
        @endif rounded-lg shadow" href="{{ route('viewInvoice',$job->id) }}">
            <div class="flex flex-col">
                <div class="flex gap-2">
                    <div class="text-xl font-extrabold text-blue-900">Title: </div>
                    <div class="text-xl">
                        {{ $job->title }}
                    </div>
                    <div class="font-bold text-red-700">({{ ucwords($job->status) }})</div>
                </div>
                <div class="flex gap-2">
                    <div class="text-xl font-extrabold text-blue-900">Created By: </div>
                    <div class="text-xl">{{ $job->user->name }}</div>
                </div>
                <div class="flex gap-2">
                    <div class="text-xl font-extrabold text-blue-900">Date of Appointment: </div>
                    <div class="text-xl">{{ $job->job_startDateTime }}</div>
                </div>
                <div class="flex gap-2">
                    <div class="text-xl font-extrabold text-blue-900">Amount: </div>
                    <div class="text-xl">{{ $job->invoice->amount }}</div>
                    @if($job->invoice->paid_at)
                    <div class="font-bold text-green-700">(PAID)</div>
                    @else
                    <div class="font-bold text-red-700">(UNPAID)</div>
                    @endif
                </div>
                @if(!empty($job->worker))
                <div class="flex gap-2">
                    <div class="text-xl font-extrabold text-blue-900">Assigned To: </div>
                    <div class="text-xl">{{ $job->worker->name }}</div>
                </div>
                @endif
                <div class="flex gap-2">
                    <div class="text-xl font-extrabold text-blue-900">Location: </div>
                    <div class="text-xl">{{ $job->location }}</div>
                </div>
            </div>
            <div class="w-full">
                <div class="flex gap-2">
                    <div class="text-xl font-extrabold text-blue-900">Job Description: </div>
                    <div class="text-xl">{{ $job->job_description }}</div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="flex justify-center">
        <div class="justify-around w-1/3">
            {{ $jobs->links() }}
        </div>
    </div>
    @else
    <div class="flex flex-wrap justify-center w-full p-5 rounded-lg">
        <div class="w-9/12 p-5 mt-2 mb-3 bg-white rounded-lg shadow">
            <div class="w-full py-2">
                <div class="flex flex-col text-center">
                    <div class="text-xl font-extrabold text-blue-900">No Jobs Completed</div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
