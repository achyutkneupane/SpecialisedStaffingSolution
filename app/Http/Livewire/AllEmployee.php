<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AllEmployee extends Component
{
    public function viewEmployee($id)
    {
        redirect()->route('viewEmployee',$id);
    }
    public function render()
    {
        $employees = User::with('works')->where('role','employee')->paginate(10);
        return view('livewire.all-employee',compact('employees'));
    }
}
