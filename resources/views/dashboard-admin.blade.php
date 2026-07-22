<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
<form method="POST" action="{{ route('create-event') }}">
    @csrf
    <button type="submit">Create Event</button>
</form>
@foreach ($event1 as $event)

{{ $event->title }}
{{ $event->capacity - $event->reservation_count }}


@endforeach
