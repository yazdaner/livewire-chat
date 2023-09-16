<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;

class Users extends Component
{
    public $users;
    public $roomId;

    protected function getListeners()
    {
        return [
            "echo-presence:chat.room.{$this->roomId},here" => 'here',
            "echo-presence:chat.room.{$this->roomId},joining" => 'joining',
            "echo-presence:chat.room.{$this->roomId},leaving" => 'leaving',
        ];
    }
    public function here($users)
    {
        $this->users = $users;
    }
    public function joining($user)
    {
        array_push($this->users,$user);
    }
    public function leaving($user)
    {
        $this->users = array_filter($this->users,function($u) use ($user)
        {
            return $u['id'] != $user['id'];
        });
    }
    public function render()
    {
        return view('livewire.chat.users');
    }
}
