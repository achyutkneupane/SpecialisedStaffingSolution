<div class="h-screen w-full">
    @if($jobs->count() > 0)
    <div class="w-full rounded-lg p-5 flex flex-wrap justify-center">
        @foreach($jobs as $job)
        <a class="bg-white shadow w-9/12 rounded-lg p-5 mt-2 mb-3" href="{{ route('viewJob',$job->id) }}">
            <div class="flex justify-around">
                <div class="flex flex-col text-center">
                    <div class="text-xl font-extrabold text-blue-900">Title: </div>
                    <div class="text-xl">{{ $job->title }}</div>
                </div>
                <div class="flex flex-col text-center">
                    <div class="text-xl font-extrabold text-blue-900">Created By: </div>
                    <div class="text-xl">{{ $job->user->name }}</div>
                </div>
                <div class="flex flex-col text-center">
                    <div class="text-xl font-extrabold text-blue-900">Date of Appointment: </div>
                    <div class="text-xl">{{ $job->job_startDateTime }}</div>
                </div>
                @if(!empty($job->worker))
                <div class="flex flex-col text-center">
                    <div class="text-xl font-extrabold text-blue-900">Assigned To: </div>
                    <div class="text-xl">{{ $job->worker->name }}</div>
                </div>
                @endif
            </div>
            <div class="py-2 w-full">
                <div class="flex flex-col text-center">
                    <div class="text-xl font-extrabold text-blue-900">Job Description: </div>
                    <div class="text-xl">{{ $job->job_description }}</div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="flex justify-center">
        <div class="w-1/3 justify-around">
            {{ $jobs->links() }}
        </div>
    </div>
    @else
    <div class="w-full rounded-lg p-5 flex flex-wrap justify-center">
        <div class="bg-white shadow w-9/12 rounded-lg p-5 mt-2 mb-3">
            <div class="py-2 w-full">
                <div class="flex flex-col text-center">
                    <div class="text-xl font-extrabold text-blue-900">No Jobs Appointed</div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
