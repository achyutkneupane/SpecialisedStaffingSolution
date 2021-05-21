<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewEmployee extends Component
{
    public $employeeId,$employee;
    public function mount($id)
    {
        $this->employeeId = $id;
    }
    public function blockEmployee()
    {
        User::find($this->employeeId)->update(['blocked'=>true]);
    }
    public function unblockEmployee()
    {
        User::find($this->employeeId)->update(['blocked'=>false]);
    }
    public function render()
    {
        $this->employee = User::where('role','employee')->find($this->employeeId);
        return view('livewire.view-employee');
    }
}
