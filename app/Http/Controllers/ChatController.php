<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function index()
    {
        $rooms = Room::all();
        return view('chat.index',[
            'rooms' => $rooms
        ]);
    }
    public function show(Room $room)
    {
        $messages = $room->messages()->with('user')->latest()->get();
        return view('chat.show',compact('messages','room'));
    }
}
