<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = ['clearNotf' => 'render'];
    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications;
        return view('livewire.sidebar');
    }
}
