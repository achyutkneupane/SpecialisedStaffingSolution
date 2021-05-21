<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required'
    ];
    protected $messages =[
        'email.exists' => "This email doesnt exist in our system"
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
        $user = User::where('email',$this->email)->first();
        if($user->blocked)
            $this->addError('email','You have blocked from entering the system.');
        elseif(Hash::check($this->password, $user->password)) {
            Auth::loginUsingId($user->id);
            redirect()->route('home');
        }
        else {
            $this->addError('password','You have entered wrong password.');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
