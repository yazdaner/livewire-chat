@extends('layouts.app')
@section('content')
<div class="card my-5" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        @foreach ($rooms as $room)
            <li class="list-group-item"><a href="{{route('chat.show',['room' => $room->slug])}}" class="nav-link">{{$room->title}}</a></li>
        @endforeach
    </ul>
  </div>
@endsection
