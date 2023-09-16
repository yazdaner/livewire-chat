<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email,$password;
    public $rememberme = false;
    protected $rules = [
        'email' => 'required|email|max:255',
        'password' => 'required|string',
    ];
    public function login()
    {
        $this->validate();
        if(auth()->attempt(['email' => $this->email, 'password' => $this->password],$this->rememberme)){
            session()->flash('successful', 'your login was successful!');
            return redirect()->route('home');
        }else{
            session()->flash('error', 'email or password are wrong!');
        }

    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
