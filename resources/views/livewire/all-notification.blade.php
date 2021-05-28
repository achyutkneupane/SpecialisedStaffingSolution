<div class="flex flex-col items-center h-screen mt-4">
    <h1 class="pb-4 text-4xl font-bolder">All Notifications</h1>
    @if($notifications->count() > 0)
        @foreach($notifications as $notification)
            @if($notification->type == "App\Notifications\NewUserNotification")
                <div class="w-5/12 p-3 text-black bg-green-200 border border-green-600 rounded-lg shadow">
                    <div wire:click='markNotfAsRead("{{ $notification->id }}")' class='text-blue-400 cursor-pointer'>Mark as read</div>
                    New {{ $notification->data['role'] }} <b>{{ $notification->data['name'] }}</b> has registered.
                </div>
            @endif
        @endforeach
    @else
    <div class="w-5/12 p-3 text-center text-black bg-white border border-gray-600 rounded-lg shadow">
        You don't have any unread notifications
    </div>
    @endif
</div>
