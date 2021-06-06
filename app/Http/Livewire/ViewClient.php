<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewClient extends Component
{
    public $clientId,$client;
    public function mount($id)
    {
        $this->clientId = $id;
    }
    public function blockClient()
    {
        User::find($this->clientId)->update(['blocked'=>true]);
    }
    public function unblockClient()
    {
        User::find($this->clientId)->update(['blocked'=>false]);
    }
    public function render()
    {
        $this->client = User::where('role','client')->find($this->clientId);
        return view('livewire.view-client');
    }
}
