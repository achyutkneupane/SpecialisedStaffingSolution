<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $email,$password,$role,$name;
    public $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'name' => 'required',
        'role' => 'required',
    ];
    protected $messages =[
        'email.unique' => "This email already exist in our system."
    ];
    public function mount()
    {
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function authenticate()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);
        event(new Registered($user));
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.register');
    }
}
