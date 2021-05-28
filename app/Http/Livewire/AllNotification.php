<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class AllNotification extends Component
{
    public $notifications;
    public function markNotfAsRead($id)
    {
        $this->notifications->find($id)->markAsRead();
        $this->emit('clearNotf');
    }
    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications;
        return view('livewire.all-notification');
    }
}
