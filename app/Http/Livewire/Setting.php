<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Setting extends Component
{
    public $old_password,$new_password,$confirm_password;
    public $rules = [
        'old_password' => 'required',
        'new_password' => 'required|different:old_password',
        'confirm_password' => 'required|same:new_password',
    ];
    public function mount()
    {
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function changePassword()
    {
        $this->validate();
        if(Hash::check($this->old_password, auth()->user()->password)) {
            $user = User::find(auth()->id());
            $user->password = Hash::make($this->new_password);
            $user->save();
            $this->reset('old_password','new_password','confirm_password');
            session()->flash('PasswordChanged', 'Password has been changed successfully.');
        }
        else {
            $this->addError('old_password','You have entered wrong password.');
        }
    }
    public function render()
    {
        return view('livewire.setting');
    }
}
