<?php

namespace App\Http\Livewire\Chat;

use App\Models\Message;
use Livewire\Component;

class Messages extends Component
{
    public $messages;
    public $roomId;

    protected function getListeners()
    {
        return [
            'addMessage' => 'prependMessages',
            "echo-private:chat.room.{$this->roomId},ChatMessageAddedEvent" => 'prependMessagesBroadcat',
        ];
    }

    public function prependMessages($messageId)
    {
        $this->messages->prepend(Message::find($messageId));
    }
    public function prependMessagesBroadcat($payload)
    {
        $this->prependMessages($payload['message']);
    }
    public function render()
    {
        return view('livewire.chat.messages');
    }
}
