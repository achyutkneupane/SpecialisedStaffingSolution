<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications;
        return view('livewire.sidebar');
    }
}
