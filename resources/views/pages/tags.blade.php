@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>TAGS</h1>
        {{-- <ul>
            @foreach( $events as $event )
            <li class="my-2">
                {{ $event -> name }}
                <br>
                Tag:
                @foreach ($event -> tags as $tag)
                    {{$tag -> name}}
                    <br>
                    Id Tag:{{$tag -> id}}
                    <br>
                @endforeach
            </li>
            @endforeach
        </ul> --}}
        <ul>
            @foreach ($tags as $tag)
                <li class="my-3">
                    Tag:
                    {{$tag->name}}
                    <br>
                    Evento:
                    @foreach ($tag -> events as $event)
                        {{$event -> name}}
                        
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
@endsection
