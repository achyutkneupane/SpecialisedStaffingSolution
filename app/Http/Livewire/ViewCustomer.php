<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewCustomer extends Component
{
    public $customerId,$customer;
    public function mount($id)
    {
        $this->customerId = $id;
    }
    public function blockCustomer()
    {
        User::find($this->customerId)->update(['blocked'=>true]);
    }
    public function unblockCustomer()
    {
        User::find($this->customerId)->update(['blocked'=>false]);
    }
    public function render()
    {
        $this->customer = User::where('role','customer')->find($this->customerId);
        return view('livewire.view-customer');
    }
}
