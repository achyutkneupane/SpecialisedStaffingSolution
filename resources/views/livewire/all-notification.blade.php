<div class="flex flex-col items-center h-screen mt-4">
    <div class="loading" wire:loading></div>
    <h1 class="pb-4 text-4xl font-bolder">All Notifications</h1>
    @if($notifications->count() > 0)
        @foreach($notifications as $notification)
                <div class="w-5/12 p-3 my-2 text-black bg-green-200 border border-green-600 rounded-lg shadow">
                    <div wire:click='markNotfAsRead("{{ $notification->id }}")' class='text-blue-400 cursor-pointer'>Mark as read</div>
                    @if($notification->type == "App\Notifications\NewUserNotification")
                    New {{ $notification->data['role'] }} <b>{{ $notification->data['name'] }}</b> has registered.
                    @elseif($notification->type == "App\Notifications\AssignedToJobNotification")
                    You have been assigned to a job "<b>{{ $notification->data['title'] }}</b>".<br><a href="{{ route('viewJob',$notification->data['id']) }}" class="text-blue-400 cursor-pointer">View Job</a>
                    @elseif($notification->type == "App\Notifications\AssignedToJobNotificationForCustomer")
                    Your job "<b>{{ $notification->data['title'] }}</b>" have been assigned to "<b>{{ $notification->data['worker_name'] }}</b>".<br><a href="{{ route('viewJob',$notification->data['id']) }}" class="text-blue-400 cursor-pointer">View Job</a>
                    @elseif($notification->type == "App\Notifications\JobApprovedNotification")
                    Your job "<b>{{ $notification->data['title'] }}</b>" have been approved.<br><a href="{{ route('viewJob',$notification->data['id']) }}" class="text-blue-400 cursor-pointer">View Job</a>
                    @endif
                </div>
        @endforeach
    @else
    <div class="w-5/12 p-3 text-center text-black bg-white border border-gray-600 rounded-lg shadow">
        You don't have any unread notifications
    </div>
    @endif
</div>
