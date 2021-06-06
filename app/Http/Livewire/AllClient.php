<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AllClient extends Component
{
    public function viewClient($id)
    {
        redirect()->route('viewClient',$id);
    }
    public function render()
    {
        $clients = User::with('jobs')->where('role','client')->paginate(10);
        return view('livewire.all-client',compact('clients'));
    }
}
