<div class="flex flex-col items-center justify-center h-screen gap-4">
    <div class="flex justify-between w-11/12 gap-3">
        <div class="flex flex-col w-1/3">
            <div class="p-2 text-xl text-center text-white uppercase bg-red-700 border-b-2 border-black">
                HIGH Priority
            </div>
            @if($this->getJobs('2')->count() > 0)
            @foreach($this->getJobs('2') as $job)
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
            <div class="p-2 text-xl text-center text-white uppercase bg-yellow-500 border-b-2 border-black">
                Medium Priority
            </div>
            @if($this->getJobs('1')->count() > 0)
            @foreach($this->getJobs('1') as $job)
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
            <div class="p-2 text-xl text-center text-white uppercase bg-green-700 border-b-2 border-black">
                Low Priority
            </div>
            @if($this->getJobs('0')->count() > 0)
            @foreach($this->getJobs('0') as $job)
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
