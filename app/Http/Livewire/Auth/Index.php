<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Index extends Component
{
    public $showRegisterForm = false ;

    protected $listeners = ['showRegisterFormEvent'];

    public function showRegisterFormEvent($status)
    {
       $this->showRegisterForm = $status;
    }

    public function render()
    {
        return view('livewire.auth.index')->extends('layouts.app')->section('content');
    }
}
