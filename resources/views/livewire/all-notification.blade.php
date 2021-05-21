<div class="flex flex-col h-screen items-center justify-center">
    <h1 class="text-4xl font-bolder pb-4">All Notifications</h1>
    @if($notifications->count() > 0)
    @foreach($notifications as $notification)
    <div class="bg-green-200 text-black border border-green-600 shadow w-5/12 rounded-lg p-3">
        <div wire:click='markNotfAsRead("{{ $notification->id }}")' class='cursor-pointer text-blue-400'>Mark as read</div>
        New {{ $notification->data['role'] }} <b>{{ $notification->data['name'] }}</b> has registered.
    </div>
    @endforeach
    @else
    <div class="bg-white text-black border border-gray-600 shadow w-5/12 rounded-lg p-3 text-center">
        You don't have any unread notifications
    </div>
    @endif
</div>
