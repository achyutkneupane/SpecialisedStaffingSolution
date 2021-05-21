<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AllCustomer extends Component
{
    public function viewCustomer($id)
    {
        redirect()->route('viewCustomer',$id);
    }
    public function render()
    {
        $customers = User::with('jobs')->where('role','customer')->paginate(10);
        return view('livewire.all-customer',compact('customers'));
    }
}
