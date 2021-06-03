<div class="flex flex-col items-center justify-center h-screen gap-4">
    <div class="flex justify-between w-11/12 gap-3">
        <div class="flex flex-col w-1/3">
            <div class="flex justify-between p-2 text-xl text-center text-white bg-red-700 border-b-2 border-black">
                <div class="uppercase">HIGH Priority</div>
                <div class="font-bold">{{ $this->getJobsCount('2') }} Jobs</div>
            </div>
            @if($this->getJobsCount('2') > 0)
            @foreach($this->getFourJobs('2') as $job)
            <a class="p-2 text-black bg-red-200 border-b border-gray-600" href="{{ route('viewJob',$job->id) }}">
                {{ $job->title }}
            </a>
            @endforeach
            @else
            <div class="p-2 text-center text-black bg-red-200">
                No High Priority Jobs
            </div>
            @endif
        </div>
        <div class="flex flex-col w-1/3">
            <div class="flex justify-between p-2 text-xl text-center text-white bg-yellow-500 border-b-2 border-black">
                <div class="uppercase">Medium Priority</div>
                <div class="font-bold">{{ $this->getJobsCount('1') }} Jobs</div>
            </div>
            @if($this->getJobsCount('1') > 0)
            @foreach($this->getFourJobs('1') as $job)
            <a class="p-2 text-black bg-yellow-200 border-b border-gray-600" href="{{ route('viewJob',$job->id) }}">
                {{ $job->title }}
            </a>
            @endforeach
            @else
            <div class="p-2 text-center text-black bg-yellow-200">
                No Medium Priority Jobs
            </div>
            @endif
        </div>
        <div class="flex flex-col w-1/3">
            <div class="flex justify-between p-2 text-xl text-center text-white bg-green-700 border-b-2 border-black">
                <div class="uppercase">Low Priority</div>
                <div class="font-bold">{{ $this->getJobsCount('0') }} Jobs</div>
            </div>
            @if($this->getJobsCount('0') > 0)
            @foreach($this->getFourJobs('0') as $job)
            <a class="p-2 text-black bg-green-200 border-b border-gray-600" href="{{ route('viewJob',$job->id) }}">
                {{ $job->title }}
            </a>
            @endforeach
            @else
            <div class="p-2 text-center text-black bg-green-200">
                No Low Priority Jobs
            </div>
            @endif
        </div>
    </div>
    <div class="w-4/12 p-5 text-center bg-white rounded-lg shadow">
        <img src="{{ asset('statics/logo.jpeg') }}" alt="Logo" class="p-2 my-3">
        <p>
            You have successfully logged in
        </p>
        <p class="text-xl text-blue-800">
            {{ auth()->user()->name }}
        </p>
    </div>
</div>
