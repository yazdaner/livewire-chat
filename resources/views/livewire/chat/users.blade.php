<ul class="list-group list-group-flush">
    @if ($users != null)
        @foreach ($users as $user)
            <li id="user-{{$user['id']}}" class="list-group-item">
                {{$user['name']}}
            </li>
        @endforeach
    @endif
</ul>
