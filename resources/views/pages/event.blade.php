@extends('layouts.app')
@section('content')
    @auth

        <ul>
            <h1>Eventi</h1>
            <a href="{{ route('event.create', ['id' => $user_id]) }}">CREATE</a>
            @foreach ($events as $event)
                @if ($user_id == $event -> user -> id)
                    <li class="my-2">
                        {{ $event->name }}
                        {{ $event->description }}
                        <br>
                        tag:
                        @foreach ($event->tags as $tag)
                            {{ $tag->name }}
                            <br>
                            Id Tag:{{ $tag->id }}
                            <br>
                        @endforeach
                    </li>

                    <h2><a href="{{ route('pages.edit', $event->id) }}">EDIT</a></h2>
                    <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE">
                    </form>
                @endif
            @endforeach
        </ul>
    @else
        <p>Effettua l'accesso per visualizzare questa sezione.</p>
    @endauth
@endsection
