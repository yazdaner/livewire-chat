<?php

namespace App\Http\Livewire\Chat;

use App\Events\ChatMessageAddedEvent;
use App\Models\Message;
use Livewire\Component;

class CreateMessage extends Component
{
    public $text;
    public $room;


    public function updatingText()
    {
        $this->dispatchBrowserEvent('typing');
    }

    public function create()
    {
       if($this->text != ''){
        $message = Message::create([
            'user_id' => auth()->user()->id,
            'room_id' => $this->room->id,
            'text' => $this->text,
        ]);
        broadcast(new ChatMessageAddedEvent($this->room->id,$message->id))->toOthers();
        $this->emitTo('chat.messages','addMessage',$message->id);
        $this->reset(['text']);
       }
    }
    public function render()
    {
        return view('livewire.chat.create-message');
    }
}
