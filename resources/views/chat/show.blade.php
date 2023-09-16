@extends('layouts.app')
@section('script')
<script>
    window.addEventListener('typing', () => {

        let echo = Echo.private("chat.room.{{$room->id}}");

        setTimeout(() => {
            echo.whisper('typing', {
                    id: "{{auth()->user()->id}}",
                    name: "{{auth()->user()->name}}"
                });
        }, 500);

        });
        Echo.private("chat.room.{{$room->id}}")
            .listenForWhisper('typing', (e) => {
                let li = document.querySelector(`#user-${e.id}`);
                let span = document.createElement('span');
                span.classList = 'badge rounded-pill text-bg-primary';
                span.innerText = 'typing ...';
                if(! li.querySelector('.badge')){
                    li.appendChild(span);
                }
                setTimeout(() => {
                    if(li.querySelector('.badge')){
                        li.removeChild(span);
                    }
                }, 2000);
            });
</script>
@endsection
@section('content')
<div class="row mt-5 g-3">
    <div class="col-md-2">
        <div class="card shadow">
            <div class="card-header">
                <h4>{{$room->title}}</h4>
            </div>
            <livewire:chat.users :roomId="$room->id" />
        </div>
    </div>
    <div class="col-md-10">
        <div class="card shadow">
            <div class="card-header">
                <h4>Messages</h4>
            </div>
            <livewire:chat.messages :messages="$messages" :roomId="$room->id" />
            <livewire:chat.create-message :room="$room" />
        </div>
    </div>
</div>
@endsection
